<?php

namespace FormationBundle\Repository;

/**
 * CommentaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentaireRepository extends \Doctrine\ORM\EntityRepository
{
    public function findCommentaireByPromeleve($promotion, $ideleve)
    {
        $qb = $this->createQueryBuilder('c')
            ->delete('FormationBundle:Commentaire', 'c')
            ->where('c.eleve = :eleve')
            ->setParameter('eleve', $ideleve)
            ->andWhere('c.promotion = :promo')
            ->setParameter('promo', $promotion)
            ->getQuery();

        $qb->execute();
    }
}
