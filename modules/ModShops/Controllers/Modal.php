<?php
namespace MVP\Shops\Controllers;

use MVP\Core\Controllers\Core;

class Modal extends Core
{
    private $productModel;
    public function __construct()
    {
        parent::__construct();
        $this->productModel = model('MVP\Shops\Models\ProductModel');
    }
    public function modalDelProd($id){
        $product = $this->productModel->find($id);
        if($this->request->getPost()){
            $this->productModel->delete($id);
            return redirect()->to(site_url('cabinet/products'))->with('message', message('Успешно удален товар.'));
        }
        if(!$this->request->getPost() and $product)
        {
            $data['product'] = $product;
            return $this->tmpl->view('ModShops/cabinet/shops/modals/product-del',$data, true);
        }
        return __('Такой страницы нету');
    }
    public function modalAddProd(){
        $arr['groups'] = $this->productModel->groupsProd();
        if($this->request->getPost()){

            $data = $this->request->getPost();
            if (! $this->productModel->save($data))
            {
                return redirect()->to(site_url('cabinet/products'))->with('message', message('Поле <b>Найменование</b> обязательное к заполнению.',3));
            }
            return redirect()->to(site_url('cabinet/products'))->with('message', message('Успешно обновлен товар.'));
        }
        return $this->tmpl->view('ModShops/cabinet/shops/modals/product-add',$arr, true);
    }
    public function modalEditProd($id){
        $product = $this->productModel->find($id);
        if($this->request->getPost()){
            $rules = [
                'name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Найменование')]),
                    ]
                ],
            ];
            if (! $this->validate($rules))
            {
                return redirect()->to(site_url('cabinet/products'))->with('message', message('Поле <b>Найменование</b> обязательное к заполнению.',3));
            }
            $this->productModel->update($id, ['name' => $_POST['name'],'id_gr' => $_POST['id_gr']]);

            return redirect()->back()->with('message', message('Успешно обновлен товар.'));
        }
        if(!$this->request->getPost() and $product)
        {
            $data['product'] = $product;
            $data['groups'] = $this->productModel->groupsProd();
            return $this->tmpl->view('ModShops/cabinet/shops/modals/product-edit',$data, true);
        }
        return __('Такой страницы нету');
    }
}