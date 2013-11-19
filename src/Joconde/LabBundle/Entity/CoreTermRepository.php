<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreTermRepository extends EntityRepository {

    public function findByTerm($search) {
        $qb = $this->createQueryBuilder('ct');
        $qb->select('ct.label')
            ->where($qb->expr()->like("lower(ct.label)", ':s'))
            ->setMaxResults(5)
            ->setParameter('s' , '%'.$search.'%');

        return $noticeTerm = $qb->getQuery()->getResult();
    }  

}