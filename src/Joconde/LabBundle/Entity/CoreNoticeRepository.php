<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class CoreNoticeRepository extends EntityRepository {

    public function findByNotice($search, $terms, $nbTerm) {
        switch ($nbTerm) {
            case '0': $max = 30; break;
            case '1': $max = 30; break;
            case '2': $max = 15; break;
            case '3': $max = 10; break;
            case '4': $max = 8; break;
            case '5': $max = 6; break;
            case '6': $max = 5; break;
            case '7': $max = 5; break;
            case '8': $max = 4; break;
        }

        $noticeArray = array();
        $qb = $this->createQueryBuilder('cn');

        if(is_array($search)) {
            foreach ($search as $key=>$word) {
                    $or = $qb->expr()->orX();
                    foreach ($terms[$key] as $term){ 
                        $thesaurusLabel = $term['label'];
                        $thesaurusLabel = strtolower($thesaurusLabel);
                        $thesaurusLabel = "cn.".$thesaurusLabel;
                        
                        $or->add($qb->expr()->like("lower($thesaurusLabel)", '\'%'.$word.'%\''));
                    }
                    $qb->andWhere($or);
            }


            $qb->andWhere("cn.image = 'true'")
                    ->setMaxResults(30);
            
            // echo $qb->getQuery()->getDql();
            
            $noticeArray = $qb->getQuery()->getResult();
        } else {
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

                    $qb->where($qb->expr()->like("lower($thesaurusLabel)", ':s'))
                        ->andWhere("cn.image = 'true'")
                        ->setMaxResults($max)
                        ->setParameter("s", '%'.$search.'%');

                    $notice = $qb->getQuery()->getResult();
                    $noticeArray = array_merge($noticeArray, $notice);

                }

                $qb->where($qb->expr()->like("lower(cn.titr)", ':s'))
                    ->andWhere("cn.image = 'true'")
                    ->setMaxResults($max)
                    ->setParameter("s", '%'.$search.'%');

                $notice = $qb->getQuery()->getResult();
                $noticeArray = array_merge($noticeArray, $notice);

            }
        }
        
        return $noticeArray;

    }  

    public function findByTitle($search) {
        $qb = $this->createQueryBuilder('cn');
        $qb->select('cn.titr')
            ->where($qb->expr()->like("lower(cn.titr)", ':s'))
            ->andWhere("cn.image = 'true'")
            ->setMaxResults(4)
            ->setParameter("s", '%'.$search.'%');

        return $qb->getQuery()->getResult();
    }

    public function findByNoticeId($id) {
        $qb = $this->createQueryBuilder('cn');
        $qb->select("cn.titr, cn.autr, cn.video")
            ->where("cn.id = :s ")
            ->andWhere("cn.image = 'true'")
            ->setParameter("s", $id);

        return $qb->getQuery()->getResult();
    }

}