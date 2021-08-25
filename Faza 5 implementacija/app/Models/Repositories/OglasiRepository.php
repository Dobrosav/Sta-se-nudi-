<?php


namespace App\Models\Repositories;


use Doctrine\ORM\EntityRepository;

class OglasiRepository extends EntityRepository
{
    public function pretragadql($tekst)
    {
        $dql = "SELECT o FROM App\Models\Entities\Oglasi o " .
            " WHERE o.title like :pretraga OR o.text like :pretraga";
        return $this->getEntityManager()->createQuery($dql)
            ->setParameter('pretraga', '%' . $tekst . '%')
            ->getResult();
    }
}