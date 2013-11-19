<?php

namespace Joconde\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
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
                $search = strtolower($search);
                $terms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus($search);

                $nbTerm = count($terms);

                $notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($search, $terms, $nbTerm);

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

    public function autocompleteAjaxAction()
    {
        $request = $this->container->get('request');
 
        if($request->isXmlHttpRequest())
        {
            // get title sent ($_GET)
            $term = $request->query->get('term');
 
            $repository = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreTerm')->findByTerm($term);
            return new JsonResponse($repository);
        }
    }

    public function noticeAction($id)
    {
        $em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
        $notice = $em->find($id);
        return $this->render('JocondeLabBundle:Notice:view.html.twig', array("notice" => $notice));
    }
}