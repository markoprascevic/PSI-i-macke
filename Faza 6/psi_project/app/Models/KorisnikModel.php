<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';

    protected $allowedFields = ['password', 'imeiprezime','email','adresa','telefon','admin','username'];

    public function findByEmail($email) {
        return $this->where('email', $email)->findAll();      
    }
        
}