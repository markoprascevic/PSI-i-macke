<?php namespace App\Models;

use CodeIgniter\Model;

class SrecnaModel extends Model
{
    protected $table      = 'srecnaprica';
    protected $primaryKey = 'srecnapricaId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'opis', 'srecnapricaId'];

}