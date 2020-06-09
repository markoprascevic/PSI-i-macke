<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa SlikaModel koja predstavlja tabelu slika u bazi
@version 1.0
*/

class SlikeModel extends Model
{
    protected $table      = 'slikehtml';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika'];

}