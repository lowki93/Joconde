<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreThesaurusRepository extends EntityRepository {

    public function findByTerm($search) {
        $qb = $this->createQueryBuilder('cth');
        return $qb->select('cth.label')
            ->leftJoin('JocondeLabBundle:CoreTerm', 'ct')
            ->where($qb->expr()->like("lower(ct.label)", ':s'))
            ->andWhere('ct.thesaurus = cth')
            ->setParameter('s' , '%'.$search.'%')
            ->groupBy('cth.label')
            ->getQuery()
            ->getResult();
    }  

}