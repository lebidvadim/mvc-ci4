<?php
namespace MVP\Shops\Controllers;

use MVP\Core\Controllers\Core;


class Score extends Core
{
    private $productModel;
    private $appModel;
    private $prodCatModel;
    public function __construct()
    {
        parent::__construct();
        $this->productModel = model('MVP\Shops\Models\ProductModel');
        $this->prodCatModel = model('MVP\Shops\Models\ProdCatModel');
        $this->appModel = model('MVP\Shops\Models\AppModel');
    }
    public function productsAll(){
        $this->data['title'] = __('Список товаров');

        if(in_groups('scorepr'))
            $this->data['products'] = $this->productModel->where(['type' => 1])->groupBy("id")->paginate(20);
        elseif(in_groups('scorest'))
            $this->data['products'] = $this->productModel->where(['type' => 2])->groupBy("id")->paginate(20);

        $this->data['pager'] = $this->productModel->pager;
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('cabinet'),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Список товаров')
            ],
        ]);
        $this->data['groups'] = $this->productModel->groupsProd();
        $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/products-all',$this->data, true);
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
    public function appAll(){
        $this->data['title'] = __('Заявки');
        $app = $this->appModel->where(['id_us' => $this->user->id])->asObject()->groupBy("id")->paginate(20);
        $this->data['app'] = $app;
        $this->data['pager'] = $this->appModel->pager;
        //pri($app);
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('cabinet'),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Заявки')
            ],
        ]);
        $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-all',$this->data, true);
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
    public function appAdd(){
        $this->data['title'] = __('Создать заявку');
        $start_day = mktime(0, 0, 0, date("m",time())  , date("d",time()), date("Y",time()));
        $end_day = mktime(23, 59, 59, date("m",time())  , date("d",time()), date("Y",time()));;

        $app_count = $this->appModel->where(['data >' => $start_day,'data <' => $end_day,'id_us' => $this->user->id])->countAllResults();

        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('cabinet'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('cabinet/app'),
                'text' => __('Заявки')
            ],
            [
                'type' => 's',
                'text' => __('Создать заявку')
            ],
        ]);
        $this->data['groups'] = $this->productModel->groupsProd();
        $this->data['products'] = $this->productModel->where(['type' => 1])->findAll();
        if($app_count == 0) {
            $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-add', $this->data, true);
        }
        else{
            $this->data['content'] = message(__('Вы можете создать только одну заяку в сутки, вы можете редактировать за сегодня созданую заявку. [link]',['<a href="'.site_url('cabinet/app').'">Вернутса к заявкам</a>']),2);
        }
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
    public function appAddForm()
    {
        $data = $this->request->getPost();
        $name = 0;
        foreach ($data['name'] as $v)
        {
            if($v == '')
                $name = 1;
            else {
                $name = 0;
                break;
            }
        }
        $count = 0;
        foreach ($data['count'] as $v)
        {
            if($v == '')
                $count = 1;
            else {
                $count = 0;
                break;
            }
        }
        if($count == 1 or $name == 1){
            return redirect()->back()->with('message', message('Добавте хотябы один товар.',3));
        }

        $name_arr = [];
        $count_arr = [];
        $group_arr = [];
        $unit_arr = [];
        foreach ($data['name'] as $v){
            $name_arr[] = $v;
        }
        foreach ($data['count'] as $v){
            $count_arr[] = $v;
        }
        foreach ($data['id_gr'] as $v){
            $group_arr[] = $v;
        }
        foreach ($data['unit'] as $v){
            $unit_arr[] = $v;
        }
        $ins = [];
        foreach ($name_arr as $k => $v){
            if($name_arr[$k] != '' and $count_arr[$k] != '')
            $ins[] = ['name' => $name_arr[$k],'count' => $count_arr[$k],'id_gr' => $group_arr[$k],'unit' => $unit_arr[$k]];
        }
        $end_day = mktime(22, 0, 0, date("m",time())  , date("d",time()), date("Y",time()));;
        $arr['id_us'] = $this->user->id;
        $arr['status'] = 0;
        $arr['type'] = $this->request->getPost('type');
        $arr['app'] = json_encode($ins);
        $arr['data'] = time();
        $arr['data_end'] = $end_day;

        $this->appModel->insert($arr);

        return redirect()->to(site_url('cabinet/app'))->with('message', message('Заявка успешно создана.'));
    }
    public function appEdit($id){
        $this->data['title'] = __('Редактировать заявку');

        $app_count = $this->appModel->where(['status' => 0,'id_us' => $this->user->id,'id' => $id])->countAllResults();
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('cabinet'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('cabinet/app'),
                'text' => __('Заявки')
            ],
            [
                'type' => 's',
                'text' => __('Редактировать заявку')
            ],
        ]);
        $this->data['groups'] = $this->productModel->groupsProd();
        if($app_count == 1) {
            $app = $this->appModel->where(['id' => $id,'status' => 0,'id_us' => $this->user->id])->find();
            $app_all = json_decode($app[0]->app);
            foreach ($app_all as $k => $a){
                $app_all[$k]->products = $this->productModel->where(['id_gr' => $a->id_gr])->findAll();
            }

            $this->data['app'] = $app_all;
            $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-edit', $this->data, true);
        }
        else{
            $this->data['content'] = message(__('Данную заявку вы не можете редактировать потому что либо у нее изменен статус либо ее несуществует.'),2);
        }
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
    public function appEditForm($id)
    {
        $data = $this->request->getPost();
        $name = 0;
        foreach ($data['name'] as $v)
        {
            if($v == '')
                $name = 1;
            else {
                $name = 0;
                break;
            }
        }
        $count = 0;
        foreach ($data['count'] as $v)
        {
            if($v == '')
                $count = 1;
            else {
                $count = 0;
                break;
            }
        }
        if($count == 1 or $name == 1){
            return redirect()->back()->with('message', message('Добавте хотябы один товар.',3));
        }

        $name_arr = [];
        $count_arr = [];
        $group_arr = [];
        $unit_arr = [];
        foreach ($data['name'] as $v){
            $name_arr[] = $v;
        }
        foreach ($data['count'] as $v){
            $count_arr[] = $v;
        }
        foreach ($data['id_gr'] as $v){
            $group_arr[] = $v;
        }
        foreach ($data['unit'] as $v){
            $unit_arr[] = $v;
        }
        $ins = [];
        foreach ($name_arr as $k => $v){
            if($name_arr[$k] != '' and $count_arr[$k] != '')
                $ins[] = ['name' => $name_arr[$k],'count' => $count_arr[$k],'id_gr' => $group_arr[$k],'unit' => $unit_arr[$k]];
        }

        $arr['app'] = json_encode($ins);

        $this->appModel->update($id,$arr);

        return redirect()->to(site_url('cabinet/app'))->with('message', message('Заявка успешно обновлена.'));
    }
    public function appView($id)
    {
        $this->data['title'] = __('Просмотр заявки');

        $app_count = $this->appModel->where(['id_us' => $this->user->id,'id' => $id])->countAllResults();
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url('cabinet'),
                'text' => __('Главная')
            ],
            [
                'type' => 'l',
                'link' => site_url('cabinet/app'),
                'text' => __('Заявки')
            ],
            [
                'type' => 's',
                'text' => __('Просмотр заявку')
            ],
        ]);
        $this->data['groups'] = $this->productModel->groupsProd();
        if($app_count == 1) {
            $app = $this->appModel->where(['id' => $id,'id_us' => $this->user->id])->find();
            $app_all = json_decode($app[0]->app);
            $cat = $this->prodCatModel->findAll();
            foreach ($app_all as $k => $a){
                $app_all[$k]->product = $this->productModel->where(['id' => $a->name])->findAll();
            }

            foreach ($cat as $k => $v){
                $count = 0;
                foreach ($app_all as $a){
                    if($a->id_gr == $v->id) {
                        $count = $count + 1;
                    }
                }
                $cat[$k]->count = $count;
            }
            $this->data['cat'] = $cat;
            $this->data['app'] = $app_all;
            $this->data['content'] = $this->tmpl->view('ModShops/cabinet/shops/app-view', $this->data, true);
        }
        else{
            $this->data['content'] = message(__('Данной заявки не сущесствует.'),2);
        }
        $this->tmpl->view('Core/cabinet/main',$this->data);
    }
}