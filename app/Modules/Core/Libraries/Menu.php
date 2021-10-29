<?php
namespace MVP\Core\Libraries;
class Menu
{
    public function __construct()
    {
        helper('core');
    }
    public function load($type)
    {
        $menu = [];
        if(in_groups('admin')) {
            $menu[] = [
                'order' => 1,
                'disable' => 0,
                'url' => site_url('admin'),
                'title' => __('Главная'),
                'icon' => '<i class="fas fa-home"></i>',
                'active' => 'home',
                'type' => 'sys'
            ];
        }
        /*elseif (in_groups('scorepr') or in_groups('driver') or in_groups('scorest')){
            $menu[] = [
                'order' => 1,
                'disable' => 0,
                'url' => site_url('cabinet'),
                'title' => __('Главная'),
                'icon' => '<i class="fas fa-home"></i>',
                'active' => 'home',
                'type' => 'sys'
            ];
        }*/

        $check_lib = check_mod_all();
        foreach ($check_lib as $m)
        {
            if(substr($m, 0,3) == 'Mod') {
                $mod_load = "\MVP\\".substr($m, 3)."\Libraries\\Menu";
                if (class_exists($mod_load)) {
                    $mod = new $mod_load();
                    if (method_exists($mod, 'menu')) {
                        if ($mod->menu($type)) {
                            $men = $mod->menu($type);
                            if (count($men) > 1) {
                                foreach ($men as $admin) {
                                    array_push($menu, $admin);
                                }
                            } else {
                                array_push($menu, $men[0]);
                            }
                        }
                    }
                }
            }
        }
        array_multisort(array_column($menu, 'order'), SORT_ASC, $menu);

        foreach ($menu as $k => $m)
            if (!empty($m['submenu']))
                array_multisort(array_column($m['submenu'], 'order'), SORT_ASC, $menu[$k]['submenu']);

        /*$men['admin'] = $menu;
            pri($menu);*/
        return $menu;
    }
    public function menu_active($type,$active)
    {
        $menu = $this->load($type);
        foreach ($menu as $m){
            if($m['active'] == $active){
                $menu = $m;
            }
        }
        return $menu;
    }
}