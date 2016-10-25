<?php

namespace FormationBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ModuleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModuleRepository extends EntityRepository
{
    public function findByPromo($promodule){
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->leftJoin('a.module', 'c')
            ->addSelect('c');

        $query = $query->add('where', $query->expr()->in('c', ':c'))
            ->setParameter('c', $promodule)
            ->getQuery()
            ->getResult();

        return $query;
    }
}
