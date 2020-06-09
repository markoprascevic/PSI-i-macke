<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa Oglasi koja predstavlja tabelu oglas u bazi
@version 1.0
*/


class Oglasi extends Model
{
    protected $table      = 'oglas';
    protected $primaryKey = 'oglasId';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika', 'vrsta','pol','rasa','opis','username','oglasId'];
    
/*
 * @param $username korisnicko ime korisnika autora oglasa
 * @ret oglas
 * vraca sve oglase korisnika sa zadatim usernameom
 */
    public function findByUsername($username) {
        return $this->where('username',$username)->findAll();
    }

}