<?php

namespace FormationBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PromotionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PromotionRepository extends EntityRepository
{
    public function findByPromo($promo){
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->leftJoin('a.eleve', 'c')
            ->addSelect('c');

        $query = $query->add('where', $query->expr()->in('c', ':c'))
            ->setParameter('c', $promo)
            ->getQuery()
            ->getResult();

        return $query;
    }



}
