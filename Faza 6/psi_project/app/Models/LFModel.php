<?php namespace App\Models;

use CodeIgniter\Model;

class LFModel extends Model
{
    protected $table      = 'lf';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'izgpro', 'vrsta','pol','rasa','opis','username','oglasId'];

}