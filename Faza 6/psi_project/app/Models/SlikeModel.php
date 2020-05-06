<?php namespace App\Models;

use CodeIgniter\Model;

class SlikeModel extends Model
{
    protected $table      = 'slikehtml';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';

    protected $allowedFields = ['slika'];

}