<?php namespace App\Models;

use CodeIgniter\Model;

class ZalbeModel extends Model
{
    protected $table      = 'zalba';
    protected $primaryKey = 'zalbaId';

    protected $returnType     = 'object';

    protected $allowedFields = ['zalbaId','username','opis'];

    public function findByUsername($username) {
        return $this->where('username',$username)->findAll();
    }
    
}