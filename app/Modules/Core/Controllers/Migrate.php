<?php namespace MVP\Core\Controllers;

use CodeIgniter\Controller;

class Migrate extends Controller
{
    public function index()
    {
        helper('core');
        $migrate = service('migrations');
        try
        {
            $migrate->setNamespace(null)->latest();
            return redirect()->to(site_url())->with('message', message(__('Миграция успешно выполнена')));
        }
        catch (\Exception $e)
        {
            return redirect()->to(site_url())->with('message', message(__('Что то пошло не так.'),3));
        }
    }

}