<?php
namespace MVP\Shops\Controllers;

use MVP\Core\Controllers\Core;

class Ajax extends Core
{
    private $productModel;

    public function __construct()
    {
        parent::__construct();

        $this->productModel = model('MVP\Shops\Models\ProductModel');
    }
    public function appAddItem(){
        if ($this->request->isAJAX()) {
            $this->data['groups'] = $this->productModel->groupsProd();
            $this->data['products'] = $this->productModel->where(['type' => 1])->findAll();

            echo $this->tmpl->view('ModShops/cabinet/shops/ajax/item-app-add',$this->data, true);;
        }
    }
    public function appSelectCat()
    {
        if ($this->request->isAJAX()) {
            $select = $this->productModel->where(['id_gr' => $this->request->getPost('cat')])->findAll();
            if($select) {
                $select_html = '';
                foreach ($select as $se){
                    $select_html .= '<option value="'.$se->id.'">'.$se->name.'</option>';
                }
                $arr['status'] = 'yes';
                $arr['select'] = $select_html;
            }
            else{
                $arr['status'] = 'no';
                $arr['select'] = '<option value="0">Выберите товар</option>';

            }
            echo json_encode($arr);
        }
    }
}