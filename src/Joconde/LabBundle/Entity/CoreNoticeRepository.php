<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreNoticeRepository extends EntityRepository {

    public function findByNotice($search, $terms, $nbTerm) {
        $qb = $this->createQueryBuilder('cn');

        if(0 === $nbTerm) {
            $qb->Where($qb->expr()->like("lower(cn.titr)", "'%$search%'"));
        }
        else {
            
            $qb->where($qb->expr()->like("lower(cn.titr)", "'%$search%'"));

            for ($i=0; $i < $nbTerm; $i++) {
                $thesaurusLabel = $terms[$i]['label'];
                $thesaurusLabel = strtolower($thesaurusLabel);
                $thesaurusLabel = "cn.".$thesaurusLabel;

                $qb->orWhere($qb->expr()->like("lower($thesaurusLabel)", ":search{$i}"));
                $qb->setParameter(":search{$i}", "%$search%");
            }
        }

        return $qb->andWhere("cn.image = 'true'")
                ->setMaxResults(25)
                ->getQuery()
                ->getResult();


    }  

}