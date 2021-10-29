<?php namespace MVP\Shops\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table = 'shop_app';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_us', 'status', 'type', 'app', 'data', 'data_end', 'cron'
    ];

    protected $useTimestamps = true;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
