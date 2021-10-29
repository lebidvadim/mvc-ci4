<?php namespace MVP\Shops\Models;

use CodeIgniter\Model;

class AppDriverModel extends Model
{
    protected $table = 'shop_app_driver';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_shops', 'id_app', 'status', 'data', 'data_end'
    ];

    protected $useTimestamps = true;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
