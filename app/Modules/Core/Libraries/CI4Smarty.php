<?php namespace MVP\Core\Libraries;

use \Smarty;

class CI4Smarty extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        $this->error_reporting = E_ALL & ~ E_NOTICE;
        $this->compile_dir = WRITEPATH . "templates_c";
    }
    public function view($template, $data = array(), $return = FALSE, $caching = TRUE, $theme = '')
    {
        /*if (strpos($template, '.') === FALSE && strpos($template, ':') === FALSE)
        {
            $template .= '.tpl';
        }*/
        if ( ! stripos($template, '.'))
        {
            $template = $template.".tpl";
        }

        // Are we overriding the theme on a per load view basis?

        // Get the location of our view, where the hell is it?
        // But only if we're not accessing a smart resource


            $mod = explode('/', $template);
            if (count($mod) == 2) {
                if (file_exists(ROOTPATH . 'themes/' . 'default/' . $mod[0] . '/' . $mod[1])) {
                    $template = ROOTPATH . 'themes/' . 'default/' . $mod[0] . '/' . $mod[1];
                } else {
                    if (file_exists(APPPATH . 'Modules/' . ucfirst($mod[0]) . '/Views/' . $mod[1])) {
                        $template = APPPATH . 'Modules/' . ucfirst($mod[0]) . '/Views/' . $mod[1];
                    } else {
                        if (file_exists(ROOTPATH . 'modules/' . ucfirst($mod[0]) . '/Views/' . $mod[1])) {
                            $template = ROOTPATH . 'modules/' . ucfirst($mod[0]) . '/Views/' . $mod[1];
                        }
                    }
                }
            } else {
                $ad = '';
                for ($i = 1; $i < count($mod); $i++) {
                    $ad .= $mod[$i] . '/';
                }
                $ad = substr($ad, 0, -1);
                if (file_exists(ROOTPATH . 'themes/' . 'default/' . $ad)) {
                    $template = ROOTPATH . 'themes/' . 'default/' . $ad;
                } else {
                    if (file_exists(APPPATH . 'Modules/' . ucfirst($mod[0]) . '/Views/' . $ad)) {
                        $template = APPPATH . 'Modules/' . ucfirst($mod[0]) . '/Views/' . $ad;

                    } else {
                        if (file_exists(ROOTPATH . 'modules/' . ucfirst($mod[0]) . '/Views/' . $ad)) {
                            $template = ROOTPATH . 'modules/' . ucfirst($mod[0]) . '/Views/' . $ad;
                        }
                    }
                }
            }

        if ( ! empty($data) )
        {
            foreach ($data AS $key => $val)
            {
                $this->assign($key, $val);
            }
        }

        $template_string = $this->fetch($template);
        if ( $return === FALSE )
        {
            $this->display($template);
            return TRUE;
        }
        return $template_string;
    }


}