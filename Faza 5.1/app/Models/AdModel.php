<?php

namespace App\Models;

use CodeIgniter\Model;


/**
 * Autor: Dušan Gradojević 2018/0310
 */


/**
 * AdModel - klasa koja dohvata podatke iz baze iz tabele ads
 * 
 * @version 1.0
 */
class AdModel extends Model
{
    /**
    * @var string $table naziv tabele
    */
    protected $table      = 'ads';
    
    /**
    * @var string $primaryKey primarni kljuc
    */
    protected $primaryKey = 'idO';
    
    /**
    * @var string $returnType povratna vrednost modela
    */
    protected $returnType     = 'object';
    
    /**
    * @var string[] $allowedFields vrednosti iz tabele koje mogu da se koriste
    */
    protected $allowedFields = ['title', 'text', 'type', 'isValid', 'idK', 'category', 'date', 'state', 'country', 'img'];
    
    /**
     * Prikazuje sve oglase koji sadrze zadati pojam
     * 
     * @param String $searched
     * 
     * @return ads[]
     */    
    public function search($searched) 
    {
//        $ads = $this->where('isValid', true)->groupStart()->like('title', $searched)->groupEnd()->groupStart()
//                    ->orLike('text', $searched)->groupEnd()->findAll();
        $ads = $this->like('title', $searched)
                    ->orLike('text', $searched)->findAll();
        
        $i = 0;
        foreach ($ads as $ad)
        {
            if ($ad->isValid == false)
            {
                unset($ads[$i]);
            }
            $i++;
        }
        
        return $ads;
    }
    
    
   /**
    * Prikazuje izgled stranice koja je prosleđena sa dodatnim argumentima
    * 
    * @param boolean $valid, $field i $value mogu biti drugačijih tipova u zavisnosti od pozivaoca
    * 
    * @return ads[]
    */       
    public function getAds($field, $value, $valid = true) 
    {
        if ($valid == false)
        {
            return $this->where('isValid', false)->where($field, $value)->findAll();
        }
        else
        {
            return $this->where('isValid', true)->where($field, $value)->findAll();
        }


//        $ads = $this->where($field, $value)->findAll();
//        
//        
//        if ($valid == true)
//        {
//            return $ads;
//        }
//        
//        $i = 0;
//        foreach ($ads as $ad)
//        {
//            if ($ad->isValid == false)
//            {
//                unset($ads[$i]);
//            }
//            $i++;
//        }
//        
//        return $ads;
        
        
        
        
       
        
    }
}