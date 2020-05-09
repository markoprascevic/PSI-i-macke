<?php namespace App\Models;

use CodeIgniter\Model;

class UdomiModel extends Model
{
    protected $table      = 'udomi';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'izgpro', 'vrsta','pol','rasa','opis','username','oglasId', 'mesto','starost'];

}