<?php

namespace Joconde\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Joconde\LabBundle\Form\SearchType;

class NoticeController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SearchType());

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if($form -> isValid()){
                $term = $form->getData();
                $search = $term['search'];
                
                $terms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByTerm($search);

                $nbTerm = count($terms);

                $cn = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
                $qb = $cn->createQueryBuilder('cn');

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

                $qb->andWhere("cn.image = 'true'");
                $qb->setMaxResults(25);
                $notices = $qb->getQuery()->getResult();

                return $this->render('JocondeLabBundle:Notice:list.html.twig', array(
                        'form' => $form->createView(),
                        'notices' => $notices
                    ));
            } 
        }
        return $this->render('JocondeLabBundle:Notice:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function noticeAction($id)
    {
        $em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
        $notice = $em->find($id);
        return $this->render('JocondeLabBundle:Notice:view.html.twig', array("notice" => $notice));
    }
}