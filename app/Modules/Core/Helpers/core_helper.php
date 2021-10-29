<?php
helper('auth');
if (! function_exists('__')) {
    function __($key, $replace = [])
    {
        $lang = MVP\Core\Libraries\Language::getInstance();
        return $lang->search($key, $replace);
    }
}
if (! function_exists('message'))
{
    function message($message, $type = 1)
    {
        if ($message != '') {
            if ($type == 1)
                $mess = '<div class="alert alert-success">' . $message . '</div>';

            if ($type == 2)
                $mess = '<div class="alert alert-warning">' . $message . '</div>';

            if ($type == 3)
                $mess = '<div class="alert alert-danger">' . $message . '</div>';

            return $mess;
        } else
            return '';
    }
}
if (! function_exists('breadcrumb'))
{
    function breadcrumb($arr)
    {
        $breadcrumb = '<div class="page-title-right"><ol class="breadcrumb m-0">';
        foreach ($arr as $k => $v)
        {
            if($v['type'] == 'l')
                $breadcrumb .= '<li class="breadcrumb-item"><a href="'.$v['link'].'">'.$v['text'].'</a></li>';
            if($v['type'] == 's')
                $breadcrumb .= '<li class="breadcrumb-item active">'.$v['text'].'</li>';
        }
        $breadcrumb .= '</ol></div>';
        return $breadcrumb;
    }
}

if (! function_exists('pri'))
{
    function pri($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}
if (! function_exists('check_mod'))
{
    function check_mod($name)
    {
        $mod = scandir_mod('mod');
        $check = false;
        foreach($mod as $m) {
            $rest = substr($m, 0, 3);
            if($rest == 'Mod') {
                if ($m == 'Mod' . ucfirst($name)) {
                    $check = true;
                }
            }
            else{
                if ($m == 'Mod' . ucfirst($name)) {
                    $check = true;
                }
            }
        }
        return $check;
    }
}
if (! function_exists('check_mod_menu'))
{
    function check_mod_menu($menu,$name)
    {
        $mod = scandir_mod('mod');
        $check = 0;
        $check_menu = false;
        foreach ($menu as $me){
            if($me['active'] == $name)
                $check_menu = true;
        }
        if($check_menu == true) {
            foreach ($mod as $m) {
                if ($m == 'Mod'.ucfirst($name)) {
                    $check = 1;
                }
            }
        }
        else{
            $check = 0;
        }
        return $check;
    }
}
if (! function_exists('scandir_mod')) {
    function scandir_mod($type = 'mod')
    {
        if ($type == 'mod') {
            $files = scandir(APPPATH . '/Modules');
            if (is_dir(ROOTPATH . 'modules')) {
                $files_pak = scandir(ROOTPATH . 'modules');
                foreach ($files_pak as $p => $pa) {
                    $str = substr($pa, 0, 3);
                    if (!in_array($pa, $files) and $str == 'Mod') {
                        array_push($files, $pa);
                    }
                }
            }
        }
        $files_new = [];
        foreach ($files as $val) {
            if ($val != '.' and $val != '..') {
                $files_new[] = $val;
            }
        }
        return $files_new;
    }
}
if (! function_exists('check_mod_all'))
{
    function check_mod_all()
    {
        $mod = scandir_mod('mod');
        return $mod;
    }
}
if ( ! function_exists('redirec'))
{
    function redirects($uri = '', $method = 'auto', $code = NULL)
    {
        if ( ! preg_match('#^(\w+:)?//#i', $uri))
        {
            $uri = site_url($uri);
        }

        // IIS environment likely? Use 'refresh' for better compatibility
        if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
        {
            $method = 'refresh';
        }
        elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
        {
            if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
            {
                $code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
                    ? 303	// reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
                    : 307;
            }
            else
            {
                $code = 302;
            }
        }

        switch ($method)
        {
            case 'refresh':
                header('Refresh:0;url='.$uri);
                break;
            default:
                header('Location: '.$uri, TRUE, $code);
                break;
        }
        exit;
    }
}