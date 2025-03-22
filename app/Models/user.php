<?php namespace App\Models;

use CodeIgniter\Model;

class user extends Model {
    protected $table = 'users';
    protected $allowedFields = ['eaddress', 'pass', 'accountName', 'accountNumber', 'sortCode', 'bank'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);

        $algo = getenv('encryptionAlgo');
        $key = getenv('encryptionKey');
        $length = openssl_cipher_iv_length($algo);
        $iv = openssl_random_pseudo_bytes($length);
        $options = 0;

        $data['data']['accountNumber'] = openssl_encrypt($data['data']['accountNumber'], $algo, $key, $options, $iv);
        $data['data']['sortCode'] = openssl_encrypt($data['data']['sortCode'], $algo, $key, $options, $iv);;

        return $data; 
    }

    protected function beforeUpdate(array $data) {
        $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);

        $algo = getenv('encryptionAlgo');
        $key = getenv('encryptionKey');
        $length = openssl_cipher_iv_length($algo);
        $iv = openssl_random_pseudo_bytes($length);
        $options = 0;

        $data['data']['accountNumber'] = openssl_encrypt($data['data']['accountNumber'], $algo, $key, $options, $iv);
        $data['data']['sortCode'] = openssl_encrypt($data['data']['sortCode'], $algo, $key, $options, $iv);;

        return $data; 
    }
}