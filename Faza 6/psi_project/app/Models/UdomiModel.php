<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa KorisnikModel koja predstavlja tabelu Udomi oglasa u bazi
@version 1.0
*/

class UdomiModel extends Model
{
    protected $table      = 'udomi';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'izgpro', 'vrsta','pol','rasa','opis','username','oglasId', 'mesto','starost'];

}