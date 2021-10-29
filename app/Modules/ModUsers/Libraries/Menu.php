<?php
namespace MVP\Users\Libraries;
class Menu
{
    public function __construct()
    {
        helper('core');
    }

    public function menu($type)
    {
        $menu = [];
        $menu['admin'][] = [
            'order' => 3,
            'disable' => 0,
            'url' => site_url('admin/users'),
            'title' => __('Пользователи'),
            'active' => 'users',
            'icon' => '<i class="fas fa-users"></i>',
            'type' => 'sys',
            'submenu' => [
                [
                    'order' => 1,
                    'url' => site_url('admin/users'),
                    'title' => __('Все'),
                    'active' => ['all', 'edit', 'del'],
                ],
                [
                    'order' => 2,
                    'url' => site_url('admin/users/add'),
                    'title' => __('Добавить'),
                    'active' => 'add',
                ],
                [
                    'order' => 3,
                    'url' => site_url('admin/users/groups'),
                    'title' => __('Группы'),
                    'active' => 'groups',
                ]
            ]
        ];
        if (!empty($menu[$type]))
            return $menu[$type];
        else
            return [];
    }
}