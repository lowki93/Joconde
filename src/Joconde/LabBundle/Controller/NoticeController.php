<?php

namespace Joconde\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Joconde\LabBundle\Form\SearchType;
use Joconde\LabBundle\FlashSessionNotice;
use Symfony\Component\HttpFoundation\Session\Session;

class NoticeController extends Controller
{
	// Function for search
	public function indexAction(Request $request)
	{
		$form = $this->createForm(new SearchType());

		if($request->isMethod('POST')){
			$form->handleRequest($request);

			if($form -> isValid()){
				$term = $form->getData();
				$search = $term['search'];

				$searchForQuestion = $search;

				$pieces = explode(" ", $search);

				if(count($pieces) > 1) {
					$terms = array();
					foreach ($pieces as $search) {
						$result = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus(strtolower($search));
						$newResult = array_merge($result,array(array('label' => "titr")));
						array_push($terms,$newResult);
					}

					$nbTerm = count($terms);

					$notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($pieces, $terms, $nbTerm);

					$question = $this->get('flash.session_notice_manager')->setQuestion($searchForQuestion);

				} else {
					$search = strtolower($search);

					$terms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus($search);

					$nbTerm = count($terms);

					$notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($search, $terms, $nbTerm);

					$question = $this->get('flash.session_notice_manager')->setQuestion($search);
				}

				return $this->render('JocondeLabBundle:Notice:list.html.twig',
					array('question' => $question,
						'notices' => $notices,
						'search' => $pieces));
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

	public function noticeHoverAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			// get title sent ($_GET)
			$id = $request->query->get('id');

			$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
			$notice = $em->findByNoticeId($id);

			return new JsonResponse($notice);
		}
	}

	
	public function newQuestionAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			// get title sent ($_GET)
			$numQuestion = $request->query->get('numQuestion');
			$result["question"] = $this->get('flash.session_notice_manager')->getQuestion($numQuestion);

			return new JsonResponse($result);
		}
	}

	public function goodQuestionAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			$answer = $request->query->get('answer');
			$nbQuestion = $request->query->get('nb');

			$terms = array();
			$newsSearch = array();

			foreach ($answer as $search) {
		
				$pieces = explode(" ", $search);
	
				if(count($pieces) > 1) {

					foreach ($pieces as $myKeys) {

						$result = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus(strtolower($myKeys));
						$newResult = array_merge($result,array(array('label' => "titr")));
						array_push($terms,$newResult);
						array_push($newsSearch,$myKeys);
					}

				} else {

					$result = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus(strtolower($search));
					$newResult = array_merge($result,array(array('label' => "titr")));
					array_push($terms,$newResult);
					array_push($newsSearch,$search);

				};

			};

			$nbTerm = count($terms);

			$notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($newsSearch, $terms, $nbTerm);

			$question = $this->get('flash.session_notice_manager')->getQuestion($nbQuestion);

			$response['content'] = $this->renderView('JocondeLabBundle:Notice:ajax.list.html.twig',
									array('question' => $question,
										'notices' => $notices,
										'search' => ''));


			return new JsonResponse($response);
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
				$result["message"]="bad";
				return new JsonResponse($result);
			}
		}
	}

	public function noticeAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			// get title sent ($_GET)
			$id = $request->query->get('param');
			$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
			$notice = $em->find($id);

			$response['content'] = $this->renderView('JocondeLabBundle:Notice:view.html.twig', array("notice" => $notice));

			return new JsonResponse($response);
		}
	}

	public function deleteAllAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			$id = $request->query->get('param');
			$this->get('flash.session_notice_manager')->deleteAllFavoris();
			$notices = 0;
			$response["message"]="good";
			$response["content"] = $this->renderView('JocondeLabBundle:Notice:ajax.list.html.twig',
								array('question' => "",
									'notices' => $notices,
									'search' => '',
									'Favoris' => 'favoris'));

			return new JsonResponse($response);
		}
	}

	public function deleteOneAction()
	{
		$request = $this->container->get('request');

		if($request->isXmlHttpRequest())
		{
			$id = $request->query->get('param');

			$this->get('flash.session_notice_manager')->deleteOneFavoris($id);
			$favorite = $this->get('flash.session_notice_manager')->getFavoris();

			if(count($favorite) !== 0 ) {
				$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
				$notices = $em->findById($favorite);
			} else {
				$notices = 0;
			};	
			
			$response["selection"] = count($favorite);
			$response["message"]="good";
			$response["content"] = $this->renderView('JocondeLabBundle:Notice:ajax.list.html.twig',
								array('question' => "",
									'notices' => $notices,
									'search' => '',
									'Favoris' => 'favoris'));

			return new JsonResponse($response);
		}

	}

	public function favoriteAction()
	{
		$favorite = $this->get('flash.session_notice_manager')->getFavoris();

		if(count($favorite) !== 0 ) {
			$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
			$notices = $em->findById($favorite);
		} else {
			$notices = 0;
		};

		return $this->render('JocondeLabBundle:Notice:favorite.html.twig', array("notices" => $notices));
	}
}