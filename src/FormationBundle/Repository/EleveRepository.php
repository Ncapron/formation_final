<?php

namespace FormationBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EleveRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EleveRepository extends EntityRepository
{

    public function findEleves($promo)
    {
        $qb = $this->createQueryBuilder('e');
        // On fait une jointure avec l'entité promotion avec pour alias « p »
        // attention a ne pas chercher de cette manier FormationBundle\Promotion 
        // car symfony s'occupe lui meme dans l'entité d'oú le e.promotion
        $qb
            ->join('e.promotion', 'p')
            ->addSelect('p')
        ;
        // Puis on filtre sur l'id des promotion
        $qb->where('p.id = :promotion');
        $qb->setParameter('promotion', $promo);
        // Enfin, on retourne le résultat
        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
    
    public function findByModule($module){
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->leftJoin('a.module', 'c')
            ->addSelect('c');

        $query = $query->add('where', $query->expr()->in('c', ':c'))
            ->setParameter('c', $module)
            ->getQuery()
            ->getResult();

        return $query;
    }
    
}
