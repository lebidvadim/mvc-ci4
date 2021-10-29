<?php
namespace MVP\Shops\Controllers;

use MVP\Core\Controllers\Core;


class Driver extends Core
{
    private $productModel;
    private $appModel;
    private $appDriverModel;
    private $prodCatModel;
    private $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->productModel = model('MVP\Shops\Models\ProductModel');
        $this->prodCatModel = model('MVP\Shops\Models\ProdCatModel');
        $this->appDriverModel = model('MVP\Shops\Models\AppDriverModel');
        $this->appModel = model('MVP\Shops\Models\AppModel');
        $this->userModel = model('Myth\Auth\Models\UserModel');
    }
    public function appDriverAll()
    {
        $app = $this->appDriverModel->groupBy("id")->paginate(20);
        foreach ($app as $k => $a){
            $id_app = explode(',',$a->id_app);
            $app[$k]->app = $this->appModel->find($id_app);
            $count_app = 0;
            foreach ($app[$k]->app as $g => $gr){
                $products = json_decode($gr->app);
                $count_app += count($products);
                /*$app[$k]->app[$g]->group = [];
                $app[$k]->app[$g]->products = [];
                foreach ($products as $pr){
                    if(!in_array($pr->id_gr,$app[$k]->app[$g]->group)){
                        $app[$k]->app[$g]->group[] = $pr->id_gr;
                    }
                    if(!in_array($pr->name,$app[$k]->app[$g]->products)){
                        $app[$k]->app[$g]->products[] = $pr->name;
                    }
                }
                $app[$k]->app[$g]->group = $this->prodCatModel->find($app[$k]->app[$g]->group);
                $app[$k]->app[$g]->products = $this->productModel->find($app[$k]->app[$g]->products);
                foreach ($products as $r => $pr){
                    foreach ($app[$k]->app[$g]->products as $val) {
                        if ($pr->name == $val->id)
                            $products[$r]->name = $val->name;
                    }
                    foreach ($app[$k]->app[$g]->group as $val) {
                        if ($pr->id_gr == $val->id)
                            $products[$r]->group = $val->name;
                    }
                }*/
                $app[$k]->app[$g]->app = $products;
            }
            $app[$k]->count_app = $count_app;
        }
        //pri($app);
        $this->data['app'] = $app;
        $this->data['pager'] = $this->appDriverModel->pager;

        $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-driver-all', $this->data, true);

        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
    public function appDriverEdit($id)
    {
        $app = $this->appDriverModel->find($id);
        if($app) {
            $id_app = explode(',', $app->id_app);
            $app->app = $this->appModel->find($id_app);
            $count_app = 0;
            $groups = [];
            $prod = [];
            $prod_form = [];
            foreach ($app->app as $g => $gr) {
                $products = json_decode($gr->app);
                $count_app += count($products);
                $user = $this->userModel->find($app->app[$g]->id_us);
                $app->app[$g]->username = $user->name;
                $app->app[$g]->group = [];
                $app->app[$g]->products = [];
                //$j = 0;
                foreach ($products as $pr) {
                    if (!in_array($pr->id_gr, $groups)) {
                        $groups[] = $pr->id_gr;
                    }
                    if (!in_array($pr->id_gr, $app->app[$g]->group)) {
                        $app->app[$g]->group[] = $pr->id_gr;
                    }
                    if (!in_array($pr->name, $prod)) {
                        $prod[] = $pr->name;
                    }
                    foreach ($prod as $p => $z) {
                        if ($pr->name == $z) {
                            $prod_form[$p][] = $pr;
                        }
                    }
                    if (!in_array($pr->name, $app->app[$g]->products)) {
                        $app->app[$g]->products[] = $pr->name;
                    }
                }
                //pri($prod_form);
                $app->app[$g]->group = $this->prodCatModel->find($app->app[$g]->group);
                $app->app[$g]->products = $this->productModel->find($app->app[$g]->products);
                foreach ($products as $r => $pr) {
                    foreach ($app->app[$g]->products as $val) {
                        if ($pr->name == $val->id)
                            $products[$r]->name = $val->name;
                    }
                    foreach ($app->app[$g]->group as $val) {
                        if ($pr->id_gr == $val->id)
                            $products[$r]->group = $val->name;
                    }
                }
                $app->app[$g]->app = $products;
            }
            $app->count_app = $count_app;
            $groups = $this->prodCatModel->find($groups);


            $unit_un = [];
            foreach ($prod_form as $k => $v) {
                $unit = [];
                foreach ($v as $r => $p) {

                    if (!in_array($p->unit, $unit)) {
                        $unit[] = $p->unit;
                        $unit_un[$k][] = $p;
                    }
                }
            }

            //pri($unit_un);

            foreach ($unit_un as $k => $un) {
                foreach ($un as $a => $u) {
                    $cou = 0;

                    foreach ($prod_form as $j => $pr) {
                        foreach ($pr as $z => $s) {
                            if ($k == $j and $u->id_gr == $s->id_gr and $u->unit == $s->unit) {
                                $cou += $s->count;
                            }
                        }
                    }
                    $unit_un[$k][$a]->cou_sum = $cou;
                }
            }

            $this->data['app']['groups'] = $groups;
            $this->data['app']['prod'] = $unit_un;
            $this->data['shops'] = $app;


            $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-driver-edit', $this->data, true);
        }
        else{
            $this->data['content'] = message(__('Данной заявки нету.'),2);
        }
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
}