<?php
namespace MVP\Shops\Libraries;
class Menu
{
    public function __construct()
    {
        helper('core');
    }

    public function menu($type)
    {
        $menu = [];
        if(in_groups('scorepr') or in_groups('scorest')) {
            $menu['cabinet'][] = [
                'order' => 2,
                'disable' => 0,
                'url' => site_url('cabinet/products'),
                'title' => __('Товары'),
                'active' => 'products',
                'icon' => '<i class="fas fa-truck-loading"></i>',
                'type' => 'sys',
                /*'submenu' => [
                    [
                        'order' => 1,
                        'url' => site_url('cabinet/products'),
                        'title' => __('Список товаров'),
                        'active' => 'all',
                    ],
                    [
                        'order' => 2,
                        'url' => site_url('cabinet/products/add'),
                        'title' => __('Добавить товар'),
                        'active' => 'add',
                    ],
                ]*/
            ];
            $menu['cabinet'][] = [
                'order' => 3,
                'disable' => 0,
                'url' => site_url('cabinet/app'),
                'title' => __('Заявки'),
                'active' => 'app',
                'icon' => '<i class="fas fa-clipboard-list"></i>',
                'type' => 'sys',
                'submenu' => [
                    [
                        'order' => 1,
                        'url' => site_url('cabinet/app'),
                        'title' => __('Список заявок'),
                        'active' => 'all',
                    ],
                    [
                        'order' => 2,
                        'url' => site_url('cabinet/app/add'),
                        'title' => __('Добавить заявку'),
                        'active' => 'add',
                    ],
                ]
            ];
        }
        if(in_groups('driver') ) {
            $menu['cabinet'][] = [
                'order' => 2,
                'disable' => 0,
                'url' => site_url('cabinet/app-driver'),
                'title' => __('Заявки'),
                'active' => 'app-driver',
                'icon' => '<i class="fas fa-clipboard-list"></i>',
                'type' => 'sys',
            ];
        }
        if (!empty($menu[$type]))
            return $menu[$type];
        else
            return [];
    }
}