<?php
namespace MVP\Users\Controllers;

use MVP\Core\Controllers\Core;

class Modal extends Core
{
    private $groupModel;
    private $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->groupModel = model('Myth\Auth\Authorization\GroupModel');
        $this->userModel = model('Myth\Auth\Models\UserModel');
    }
    public function modalDel($id){
        $group = $this->groupModel->find($id);
        if($this->request->getPost()){
            if($group->name != 'admin') {
                $this->groupModel->delete($id);
                return redirect()->to(site_url('admin/users/groups'))->with('message', message('Успешно удалена группа.'));
            }
            else{
                return redirect()->to(site_url('admin/users/groups'))->with('message', message('Запрещено удалять группу Администратор.',3));
            }
        }
        if($group)
        {
            $data['group'] = $group;
            return $this->tmpl->view('ModUsers/admin/users/modals/groups-del',$data, true);
        }
        return __('Такой страницы нету');
    }
    public function modalDelUs($id){
        $user = $this->userModel->find($id);
        if($this->request->getPost()){
            if($user->id != $this->user->id) {
                $this->userModel->delete($id);
                $this->groupModel->removeUserFromAllGroups($id);
                return redirect()->to(site_url('admin/users'))->with('message', message('Успешно удалена пользователя.'));
            }
            else{
                return redirect()->to(site_url('admin/users'))->with('message', message('Запрещено удалять самого себя.',3));
            }
        }
        if($user)
        {
            $data['user'] = $user;
            return $this->tmpl->view('ModUsers/admin/users/modals/user-del',$data, true);
        }
        return __('Такой страницы нету');
    }
}