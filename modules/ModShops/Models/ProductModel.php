<?php namespace MVP\Shops\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'shop_products';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name', 'type', 'unit', 'status', 'id_gr'
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'name' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function groupsProd()
    {
        return $this->db->table('shop_category')->orderBy('id')->get()->getResultObject();
    }
}
