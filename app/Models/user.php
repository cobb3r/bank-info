<?php namespace App\Models;

use CodeIgniter\Model;

class user extends Model {
    protected $table = 'users';
    protected $allowedFields = ['eaddress', 'pass', 'accountName', 'accountNumber', 'sortCode', 'bank'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);
        return $data; 
    }

    protected function beforeUpdate(array $data) {
        $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);
        return $data; 
    }
}