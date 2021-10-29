<?php namespace MVP\Shops\Models;

use CodeIgniter\Model;

class ProdCatModel extends Model
{
    protected $table = 'shop_category';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name'
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'name' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
