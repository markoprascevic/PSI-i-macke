<?php namespace App\Models;

use CodeIgniter\Model;

class VestiModel extends Model
{
    protected $table      = 'vest';
    protected $primaryKey = 'vestId';

    protected $returnType     = 'object';

    protected $allowedFields = ['vestId','naslov','slika','opis'];

}