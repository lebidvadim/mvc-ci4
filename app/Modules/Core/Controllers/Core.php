<?php
namespace MVP\Core\Controllers;
use CodeIgniter\Controller;
use MVP\Core\Libraries\Menu;

class Core extends Controller
{
    public $data;
    public $menu;
    public $menu_active;
    public $user;
    public $tmpl;
    public $config_auth;
    public function __construct()
    {
        $this->menu = new Menu();
        helper('form');
        $this->tmpl = service('TemplateEngine');
        $this->config_auth = config('Auth');
        if(in_groups('admin')) {
            $this->data['menu'] = $this->menu->load('admin');
        }
        elseif (in_groups('scorepr') or in_groups('driver') or in_groups('scorest')){
            $this->data['menu'] = $this->menu->load('cabinet');
        }
        $this->data['message'] = null;
        if (session()->getFlashdata('message'))
            $this->data['message'] = session()->getFlashdata('message');
        if (logged_in()) {
            $groupModel = new \Myth\Auth\Authorization\GroupModel();

            $this->user = user();
            $this->user->groups = $groupModel->getGroupsForUser($this->user->id);
        }
        $this->data['user'] = $this->user;
        $this->data['config_auth'] = $this->config_auth;

    }
}