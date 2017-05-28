<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * userRatingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class userRatingRepository extends EntityRepository
{
    
    public function getUserRating($userId)
    {        
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('ur')
                ->from('AppBundle:userRating', 'ur')
                ->join('ur.user', 'u', 'WITH', 'u.id =:id')               
                ->setParameter('id', $userId);
        $query = $qb->getQuery()->getResult();
       
        return $query;
    }
}