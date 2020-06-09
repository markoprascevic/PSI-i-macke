<?php namespace App\Models;

use CodeIgniter\Model;

/*Lazar Smiljković 0125/2017

Klasa SrecnaModel koja predstavlja tabelu srecnaprica u bazi
@version 1.0
*/


class SrecnaModel extends Model
{
    protected $table      = 'srecnaprica';
    protected $primaryKey = 'srecnapricaId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'opis', 'srecnapricaId'];

}