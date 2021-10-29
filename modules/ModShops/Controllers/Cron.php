<?php
namespace MVP\Shops\Controllers;

use CodeIgniter\Controller;

class Cron extends Controller
{
    private $productModel;
    private $appModel;
    private $appDriverModel;

    public function __construct()
    {
        helper('core');
        $this->productModel = model('MVP\Shops\Models\ProductModel');
        $this->appModel = model('MVP\Shops\Models\AppModel');
        $this->appDriverModel = model('MVP\Shops\Models\AppDriverModel');
    }
    public function appShape()
    {
        $start_day = mktime(0, 0, 0, date("m",time())  , date("d",time()), date("Y",time()));
        $end_day = mktime(23, 59, 59, date("m",time())  , date("d",time()), date("Y",time()));
        $app = $this->appModel->where(['status' => 0, 'cron' => 0])->findAll();
        $id_app_mas = [];
        foreach ($app as $ap){
            $id_app_mas[] = $ap->id;
        }
        $this->appModel->update($id_app_mas, ['status' => 1]);
        $app_status = $this->appModel->where(['status' => 1,'data >' => $start_day, 'data_end < ' => $end_day, 'cron' => 0])->findAll();
        $type_pro = $this->appModel->where(['status' => 1,'data >' => $start_day, 'data_end < ' => $end_day,'type' => 1, 'cron' => 0])->findAll();
        $type_str = $this->appModel->where(['status' => 1,'data >' => $start_day, 'data_end < ' => $end_day,'type' => 2, 'cron' => 0])->findAll();
        $mas = [];
        $end_day_n = mktime(22, 0, 0, date("m",time())  , date("d",time())+2, date("Y",time()));
        if(count($type_pro) > 0) {
            $id_shops = '';
            $id_app = '';
            foreach ($app_status as $st) {
                if ($st->type == 1) {
                    $id_shops .= $st->id_us . ',';
                    $id_app .= $st->id . ',';
                }
            }
            $mas[0]['id_shops'] = substr($id_shops,0,-1);
            $mas[0]['id_app'] = substr($id_app,0,-1);
            $mas[0]['status'] = 0;
            $mas[0]['type'] = 1;
            $mas[0]['data'] = time();
            $mas[0]['data_end'] = $end_day_n;
        }
        if(count($type_str) > 0) {
            $id_shops = '';
            $id_app = '';
            foreach ($app_status as $st) {
                if ($st->type == 2) {
                    $id_shops .= $st->id_us . ',';
                    $id_app .= $st->id . ',';
                }
            }
            $mas[1]['id_shops'] = substr($id_shops,0,-1);
            $mas[1]['id_app'] = substr($id_app,0,-1);
            $mas[1]['status'] = 0;
            $mas[1]['type'] = 2;
            $mas[1]['data'] = time();
            $mas[1]['data_end'] = $end_day_n;
        }

        //pri($mas);
        if(!empty($mas)) {
            $this->appDriverModel->insertBatch($mas);
        }
        $this->appModel->update($id_app_mas, ['cron' => 1]);

    }
    public function appShapeVod(){
        $app = $this->appDriverModel->where(['data_end >' => time()])->findAll();
        foreach ($app as $a){
            $id_app = explode(',',$a->id_app);
            $this->appModel->update($id_app,['status' => 2]);
            $this->appDriverModel->update($a->id,['status' => 1, 'cron' => 1]);
        }
    }
}