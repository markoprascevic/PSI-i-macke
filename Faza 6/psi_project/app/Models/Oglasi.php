<?php namespace App\Models;

use CodeIgniter\Model;

class Oglasi extends Model
{
    protected $table      = 'oglas';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'vrsta','pol','rasa','opis','username','oglasId'];

}