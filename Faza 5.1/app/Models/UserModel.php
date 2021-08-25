<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Autor: Dobrosav Vlašković 2018/0005
 */

/**
 * UserModel - klasa koja dohvata podatke iz baze iz tabele users
 * 
 * @version 1.0
 */
class UserModel extends Model
{
    /**
    * @var string $table naziv tabele
    */
    protected $table      = 'users';
    
    /**
    * @var string $primaryKey primarni kljuc
    */
    protected $primaryKey = 'idK';
    
    /**
    * @var string $returnType povratna vrednost modela
    */
    protected $returnType     = 'object';
    
    /**
    * @var string[] $allowedFields vrednosti iz tabele koje mogu da se koriste
    */
    protected $allowedFields = ['username', 'name','surname','mail','password','country','num','date'];
}