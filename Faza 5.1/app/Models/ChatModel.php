<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Autor: Aleksandra Milović 2018/0126
 */

/**
 * ChatModel - klasa koja dohvata podatke iz baze iz tabele chats
 * 
 * @version 1.0
 */

class ChatModel extends Model
{
    /**
    * @var string $table naziv tabele
    */
    protected $table      = 'chats';
    
    /**
    * @var string $primaryKey primarni kljuc
    */
    protected $primaryKey = 'idc';
    
    /**
    * @var string $returnType povratna vrednost modela
    */
    protected $returnType     = 'object';
    protected $allowedFields = ['user_to', 'user_from', 'message', 'datetime', 'status'];
    
        
   /**
    * Prikazuje sve korisnike sa kojima se zadati korisnik dopisivao ili od kojih je primio poruke
    * 
    * @param int $userId
    * 
    * @return chats[]
    */  
    public function getFriends($userId) 
    {
        $friends = $this->where('user_to', $userId)
                    ->orWhere('user_from', $userId)->findAll();
        $i = 0;
        $length = count($friends);
        while ($i < $length - 1) 
        {
            if (!isset($friends[$i]))
            {
                $i++;
                continue;
            }
            $j = $i + 1;
            while ($j < $length)
            {   
                if (!isset($friends[$j]))
                {
                    $j++;
                    continue;
                }
                
                if (($friends[$i]->user_to == $friends[$j]->user_to && $friends[$i]->user_from == $friends[$j]->user_from) || 
                     ($friends[$i]->user_to == $friends[$j]->user_from && $friends[$i]->user_from == $friends[$j]->user_to))
                {
                    unset($friends[$j]);
                    continue;
                }
                $j++;
            }
            $i++;
        }
        
        return $friends;
    }
    
        
   /**
    * Prikazuje sve poruke između korisnika sa userId1 i korisnika sa userId2
    * 
    * @param int $userId1, int $userId2
    * 
    * @return chats[]
    */  
    public function getChat($userId1, $userId2)
    {
        $chats = $this->where('user_to', $userId1)
                    ->orWhere('user_from', $userId1)->findAll();
        
        $i = 0;
        foreach ($chats as $chat)
        {   
            if (!($chat->user_to == $userId2 || $chat->user_from == $userId2))
            {
                unset($chats[$i]);
            }
            $i++;
        }
        
        return $chats;
    }
}