<?php
namespace MVP\Core\Controllers;

class Cabinet extends Core
{
    public function index()
    {
        $this->data['active'] = 'home';
        $this->data['title'] = 'Кабинет';
        $this->data['breadcrumb'] = '';
        $this->data['content'] = message('Страница в разработке.',2);
        $this->tmpl->view('Core/cabinet/main',$this->data);
        if(in_groups('scorepr') or in_groups('scorest'))
            return redirect()->to(site_url('cabinet/app'));
        if(in_groups('driver'))
            return redirect()->to(site_url('cabinet/app-driver'));
    }
}
