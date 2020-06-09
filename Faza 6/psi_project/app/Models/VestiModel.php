<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa KorisnikModel koja predstavlja tabelu vest u bazi
@version 1.0
*/


class VestiModel extends Model
{
    protected $table      = 'vest';
    protected $primaryKey = 'vestId';

    protected $returnType     = 'object';

    protected $allowedFields = ['vestId','naslov','slika','opis'];

}