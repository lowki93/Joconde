<?php

namespace Joconde\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Joconde\LabBundle\Form\SearchType;
use Joconde\LabBundle\FlashSessionNotice;
use Symfony\Component\HttpFoundation\Session\Session;

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

                return $this->render('JocondeLabBundle:Notice:list.html.twig', array('notices' => $notices));
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
            $term = $request->query->get('param');
 
            $autocompleteTerms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreTerm')->findByTerm($term);
            $autocompleteTitle = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByTitle($term);

            $autocompleteTerms = array_merge($autocompleteTerms, $autocompleteTitle);

            return new JsonResponse($autocompleteTerms);
        }
    }

    public function addfavoriteAction()
    {
        $request = $this->container->get('request');
 
        if($request->isXmlHttpRequest())
        {
            // get title sent ($_GET)
            $id = $request->query->get('param');
            try {
                $this->get('flash.session_notice_manager')->setFavoris($id);
                $result["message"]="good";
                return new JsonResponse($result);
            } catch (\Exception $e){
                $result["message"]="deja en session";
                return new JsonResponse($result);
            }
        }
    }

    public function noticeAction($id)
    {
        $em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
        $notice = $em->find($id);
        return $this->render('JocondeLabBundle:Notice:view.html.twig', array("notice" => $notice));
    }

    public function favoriteAction()
    {
        $favorite = $this->get('flash.session_notice_manager')->getFavoris();

        $em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
        $notices = $em->findById($favorite);

        return $this->render('JocondeLabBundle:Notice:favorite.html.twig', array("notices" => $notices));
    }
}