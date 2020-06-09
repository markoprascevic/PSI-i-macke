<?php namespace App\Models;

use CodeIgniter\Model;

/*Marko Praščević 0108/2017

Klasa KorisnikModel koja predstavlja tabelu korisnik u bazi
@version 1.0
*/



class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';

    protected $allowedFields = ['password', 'imeiprezime','email','adresa','telefon','admin','username'];

/*
 * @param $email email adresa korisnika koji se pretrazuje
 * @ret Korisnik
 * vraca korisnika sa zadatim emailom ako postoji
 */
    public function findByEmail($email) {
        return $this->where('email', $email)->findAll();      
    }
        
}