<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreNoticeRepository extends EntityRepository {

    public function findByNotice($search, $terms, $nbTerm) {
        $max = 5;
        $noticeArray = array();
        $qb = $this->createQueryBuilder('cn');

        if(0 === $nbTerm) {
            $qb->where($qb->expr()->like("lower(cn.titr)", ':s'))
                ->setParameter("s", '%'.$search.'%')
                ->andWhere("cn.image = 'true'");
            return $noticeArray = $qb->getQuery()->getResult();
        }
        else {

            for ($i=0; $i < $nbTerm; $i++) {
                $thesaurusLabel = $terms[$i]['label'];
                $thesaurusLabel = strtolower($thesaurusLabel);
                $thesaurusLabel = "cn.".$thesaurusLabel;

                if( 0 === $i )
                    $qb->where($qb->expr()->like("lower(cn.titr)", ':s'));
                else
                    $qb->where($qb->expr()->like("lower($thesaurusLabel)", ':s'));

                $qb->andWhere("cn.image = 'true'")
                    ->setMaxResults($max)
                    ->setParameter("s", '%'.$search.'%');
                    
                $notice = $qb->getQuery()->getResult();
                $noticeArray = array_merge($noticeArray, $notice);

            }
        }

        return $noticeArray;

    }  

}