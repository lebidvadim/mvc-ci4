<?php
namespace MVP\Core\Controllers;

class Site extends Core
{
    public function index()
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                echo 'admin';
                return redirect()->to(site_url('admin'));
            } else {
                return redirect()->to(site_url('cabinet'));
            }
        }
        else{
            $this->data['title'] = __('Главная');
            $this->data['breadcrumb'] = '';
            $this->data['content'] = 'home-site';
            return $this->tmpl->view('Core/site/main',$this->data);
        }
    }
}
