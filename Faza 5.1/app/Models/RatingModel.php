<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Autor: Aleksandra Milović 2018/0126
 */

/**
 * RatingModel - klasa koja dohvata podatke iz baze iz tabele ratings
 * 
 * @version 1.0
 */

class RatingModel extends Model
{
    /**
    * @var string $table naziv tabele
    */    
    protected $table      = 'rating';
    
    /**
    * @var string $primaryKey primarni kljuc
    */
    protected $primaryKey = 'IdR';
    
    /**
    * @var string $returnType povratna vrednost modela
    */
    protected $returnType     = 'object';
    protected $allowedFields = ['rate', 'user_rater', 'user_rated'];
}