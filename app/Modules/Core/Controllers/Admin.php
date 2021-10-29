<?php
namespace MVP\Core\Controllers;

class Admin extends Core
{
    public function index()
    {
        $this->data['active'] = 'home';
        $this->data['title'] = 'Админ панель';
        $this->data['breadcrumb'] = '';
        $this->data['content'] = message('Страница в разработке.',2);
        $this->tmpl->view('Core/admin/main',$this->data);
    }
}
