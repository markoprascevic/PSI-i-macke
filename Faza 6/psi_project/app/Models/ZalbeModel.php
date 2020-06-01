<?php namespace App\Models;

use CodeIgniter\Model;

/*Lazar Smiljković 0125/2017

Klasa KorisnikModel koja predstavlja tabelu zalba u bazi
@version 1.0
*/

class ZalbeModel extends Model
{
    protected $table      = 'zalba';
    protected $primaryKey = 'zalbaId';

    protected $returnType     = 'object';

    protected $allowedFields = ['zalbaId','username','opis'];

/*
 * $param $username korisnicko ime autora zalbe
 * @ret Zalba
 * vraca sve zalbe korisnika sa zadatim usernameom
 */
    public function findByUsername($username) {
        return $this->where('username',$username)->findAll();
    }
    
}