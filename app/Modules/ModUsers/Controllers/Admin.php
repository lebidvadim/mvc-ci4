<?php
namespace MVP\Users\Controllers;

use MVP\Core\Controllers\Core;
use Myth\Auth\Entities\User;

class Admin extends Core
{
    private $groupModel;
    private $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->groupModel = model('Myth\Auth\Authorization\GroupModel');
        $this->userModel = model('Myth\Auth\Models\UserModel');
    }
    public function index($page, $id = 0)
    {
        $this->data['active'] = 'none';
        switch ($page){
            case 'all':
                $this->data['content'] = $this->all();
                break;
            case 'add':
                $this->data['content'] = $this->add();
                break;
            case $page == 'edit' and $id != 0:
                $this->data['content'] = $this->edit($id);
                break;
            case 'groups':
                $this->data['content'] = $this->groups();
                break;
            case 'groups-add':
                $this->data['content'] = $this->groupsAdd();
                break;
            case $page == 'groups-edit' and $id != 0:
                $this->data['content'] = $this->groupsEdit($id);
                break;
            default: throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $this->tmpl->view('Core/admin/main',$this->data);
    }
    public function indexPost($page, $id = 0)
    {
        switch ($page){
            case 'groups-add':
                return $this->groupsAddForm();
                break;
            case 'add':
                return $this->userAddForm();
                break;
            case $page == 'groups-edit' and $id != 0:
                return $this->groupsEditForm($id);
                break;
            case $page == 'edit' and $id != 0:
                return $this->userEditForm($id);
                break;
            default: throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function all(){
        $users = $this->userModel->groupBy("id")->paginate(10);
        $usersNew = [];
        foreach ($users as $k => $us){
            $usersNew[$k] = $us;
            $usersNew[$k]->group = $this->groupModel->getGroupsForUser($us->id);
        }
        $this->data['users'] = $usersNew;
        $this->data['pager'] = $this->userModel->pager;
        $this->data['active'] = 'users-all';
        $this->data['title'] = __('Пользователи');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Пользователи')
            ],
        ]);
        return $this->tmpl->view('ModUsers/admin/users/all',$this->data, true);
    }
    public function add(){
        $this->data['active'] = 'users-add';
        $this->data['groups'] = $this->groupModel->asObject()->whereIn('id', [3,4,5])->groupBy("id")->findAll();
        $this->data['title'] = __('Добавить пользователя');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('admin/users'),
                'text' => __('Пользователи')
            ],
            [
                'type' => 's',
                'text' => __('Добавить пользователя')
            ],
        ]);
        return $this->tmpl->view('ModUsers/admin/users/add',$this->data, true);
    }
    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $user->group = $this->groupModel->getGroupsForUser($user->id);
        $this->data['active'] = 'users-add';
        $this->data['userEdit'] = $user;
        $this->data['groups'] = $this->groupModel->asObject()->whereIn('id', [1,3,4,5])->groupBy("id")->findAll();
        $this->data['title'] = __('Редактировать пользователя');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('admin/users'),
                'text' => __('Пользователи')
            ],
            [
                'type' => 's',
                'text' => __('Редактировать пользователя')
            ],
        ]);
        return $this->tmpl->view('ModUsers/admin/users/edit',$this->data, true);
    }
    public function userEditForm($id)
    {
        $user = $this->userModel->find($id);
        if($user->id != $this->user->id) {
            if (!$user) {
                return redirect()->to(site_url('admin/users'))->with('message', message('Такой пользователя не существует.', 3));
            }
            $data = $this->request->getPost();

            if($data['password'] != '' and $data['pass_confirm'] != '')
            {
                $rules = [
                    'groups'	=> [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Группа')]),
                        ]
                    ],
                    'password' => [
                        'rules'  => 'required|strong_password',
                        'errors' => [
                            'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Пароль')]),
                        ]
                    ],
                    'pass_confirm' => [
                        'rules'  => 'required|matches[password]',
                        'errors' => [
                            'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Повторный пароль')]),
                            'matches' => __('Поле <b>[input]</b> не соответствует полю пароля.',[__('Повторный пароль')]),
                        ]
                    ]
                ];

                if (! $this->validate($rules))
                {
                    return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
                }
                $this->groupModel->upUserToGroup($id, $data['groups']);
                $pass = $this->userModel->setPassword($data['password']);
                $this->userModel->update($id,['password_hash' => $pass]);
            }
            else{
                if ($this->groupModel->upUserToGroup($id, $data['groups']) === false)
                    return redirect()->back()->withInput()->with('errors', $this->groupModel->errors());
            }

        }
        else{
            return redirect()->to(site_url('admin/users'))->with('message', message('Запрещено себя редактировать.',3));
        }
        return redirect()->to(site_url('admin/users'))->with('message', message('Успешно отредактирована пользователя.'));
    }
    public function userAddForm()
    {
        $data = $this->request->getPost();

        $rules = [
            'groups'	=> [
                'rules'  => 'required',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Группа')]),
                ]
            ],
            'username'	=> [
                'rules'  => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Логин')]),
                    'alpha_numeric_space' => __('Поле <b>[input]</b> может содержать только латинские буквы и цифры.',[__('Логин')]),
                    'min_length' => __('Поле <b>[input]</b> должно содержать не менее <b>[num]</b> символов.',[__('Логин'),3]),
                    'is_unique' => __('Поле <b>[input]</b> должно содержать уникальное значение.',[__('Логин'),3])
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Эмаил')]),
                    'valid_email' => __('Поле <b>[input]</b> должно содержать действительный адрес электронной почты.',[__('Эмаил')]),
                    'is_unique' => __('Поле <b>[input]</b> должно содержать уникальное значение.',[__('Эмаил'),3]),

                ]
            ],
            'password' => [
                'rules'  => 'required|strong_password',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Пароль')]),
                ]
            ],
            'pass_confirm' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Повторный пароль')]),
                    'matches' => __('Поле <b>[input]</b> не соответствует полю пароля.',[__('Повторный пароль')]),
                ]
            ]
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
        $user = new User($this->request->getPost());
        $group = $this->groupModel->find($_POST['groups']);
        $users = $this->userModel->withGroup($group->name);
        if (! $users->save($user))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }
        return redirect()->to(site_url('admin/users'))->with('message', message('Успешно добавлена пользователя.'));
    }
    public function groups()
    {
        $this->data['active'] = 'groups';
        $this->data['groups'] = $this->groupModel->groupBy("id")->paginate(10);
        $this->data['pager'] = $this->groupModel->pager;
        $this->data['title'] = __('Группы');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('admin/users'),
                'text' => __('Пользователи')
            ],
            [
                'type' => 's',
                'text' => __('Группы')
            ],
        ]);
        return $this->tmpl->view('ModUsers/admin/users/groups',$this->data, true);
    }
    public function groupsAdd()
    {
        $this->data['active'] = 'groups-add';
        $this->data['title'] = __('Добавить группы');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('admin/users/groups'),
                'text' => __('Группы')
            ],
            [
                'type' => 's',
                'text' => __('Добавить группы')
            ],
        ]);
        return $this->tmpl->view('ModUsers/admin/users/groups-add',$this->data, true);
    }
    public function groupsEdit($id)
    {
        $group = $this->groupModel->find($id);
        $this->data['active'] = 'groups-edit';
        $this->data['title'] = __('Редактировать группы');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('admin'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('admin/users/groups'),
                'text' => __('Группы')
            ],
            [
                'type' => 's',
                'text' => __('Редактировать группы')
            ],
        ]);
        if($group) {
            $this->data['group'] = $group;
            return $this->tmpl->view('ModUsers/admin/users/groups-edit', $this->data, true);
        }
        else
            return message(__('Такой группы нету'),3);
    }
    public function groupsEditForm($id)
    {
        $group = $this->groupModel->find($id);
        if(!$group){
            return redirect()->to(site_url('admin/users/groups'))->with('message', message('Такой группы не существует.',3));
        }
        $data = $this->request->getPost();
        if ($this->groupModel->update($id,$data) === false)
            return redirect()->back()->withInput()->with('errors', $this->groupModel->errors());

        return redirect()->to(site_url('admin/users/groups'))->with('message', message('Успешно отредактирована группа.'));
    }
    public function groupsAddForm()
    {
        $data = $this->request->getPost();
        $rules = [
            'name' => [
                'rules'  => 'required|alpha_numeric|is_unique[auth_groups.name]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Имя группы')]),
                    'is_unique' => __('Поле <b>[input]</b> должно содержать уникальное значение.',[__('Имя группы')]),
                    'alpha_numeric' => __('Поле <b>[input]</b> может содержать только буквенно-цифровые символы.',[__('Имя группы')])
                ]
            ],
            'description' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Описание группы')]),
                ]
            ]
        ];
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->groupModel->errors());
        }
        $this->groupModel->insert($data);
        return redirect()->to(site_url('admin/users/groups'))->with('message', message('Успешно добавлена группа.'));
    }
}