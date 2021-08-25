<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Autor: Lazar Gospavić 2018/0677
 */

/**
 * AnnouncementModel - klasa koja dohvata podatke iz baze iz tabele announcement
 * 
 * @version 1.0
 */

class AnnouncementModel extends Model
{
    /**
    * @var string $table naziv tabele
    */
    protected $table      = 'announcement';
    
    /**
    * @var string $primaryKey primarni kljuc
    */
    protected $primaryKey = 'idA';
    
    /**
    * @var string $returnType povratna vrednost modela
    */
    protected $returnType     = 'object';
    protected $allowedFields = ['title', 'text', 'idAd', 'date'];
}