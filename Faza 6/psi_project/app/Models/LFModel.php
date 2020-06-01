<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa LF koja predstavlja tabelu Lost&Found oglasa u bazi
@version 1.0
*/


class LFModel extends Model
{
    protected $table      = 'lf';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'izgpro', 'vrsta','pol','rasa','opis','username','oglasId'];

}