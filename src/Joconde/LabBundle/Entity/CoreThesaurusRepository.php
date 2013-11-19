<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreThesaurusRepository extends EntityRepository {

    public function findByThesaurus($search) {
        $qb = $this->createQueryBuilder('cth');
        $qb->select('DISTINCT cth.label')
            ->join('JocondeLabBundle:CoreTerm', 'ct')
            ->where('ct.thesaurus = cth')
            ->andWhere($qb->expr()->like("lower(ct.label)", ':s'))
            ->setParameter('s' , '%'.$search.'%')
            ->groupBy('cth.label');

        return $noticeTerm = $qb->getQuery()->getResult();
    }  

}