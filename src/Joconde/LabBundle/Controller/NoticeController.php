<?php

namespace Joconde\LabBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Joconde\LabBundle\Form\SearchType;

class NoticeController extends Controller
{
	// Function for search
	public function indexAction(Request $request)
	{
		$form = $this->createForm(new SearchType());

		if($request->isMethod('POST')){
			$form->handleRequest($request);

			if($form -> isValid()){
				// get search
				$term = $form->getData();
				$search = $term['search'];

				$searchForQuestion = $search;

				$pieces = explode(" ", $search);

				// test is an array
				if(count($pieces) > 1) {
					$terms = array();
					foreach ($pieces as $search) {
						// get term
						$result = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus(strtolower($search));
						$newResult = array_merge($result,array(array('label' => "titr")));
						array_push($terms,$newResult);
					}

					$nbTerm = count($terms);

					// get notice with is term
					$notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($pieces, $terms, $nbTerm);

					$question = $this->get('flash.session_notice_manager')->setQuestion($searchForQuestion);

				} else {
					$search = strtolower($search);
					// get term
					$terms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreThesaurus')->findByThesaurus($search);

					$nbTerm = count($terms);
					// get notice
					$notices = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByNotice($search, $terms, $nbTerm);

					$question = $this->get('flash.session_notice_manager')->setQuestion($search);
				}
				// test for get an ohter question
				if(count($notices) == 1 ) {
					$question = $this->get('flash.session_notice_manager')->getLastQuestion();
				}
				// return the view
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

	// function for autocompletion
	public function autocompleteAjaxAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			// get the beginning of your typing
			$term = $request->query->get('param');
 			// get term and titre of notice
			$autocompleteTerms = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreTerm')->findByTerm($term);
			$autocompleteTitle = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice')->findByTitle($term);

			$autocompleteTerms = array_merge($autocompleteTerms, $autocompleteTitle);

			return new JsonResponse($autocompleteTerms);
		}
	}
	
	// get question if your response is none or no
	public function newQuestionAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			$numQuestion = $request->query->get('numQuestion');
			$result["question"] = $this->get('flash.session_notice_manager')->getQuestion($numQuestion);

			return new JsonResponse($result);
		}
	}

	// get question if yout response is yes
	public function goodQuestionAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{	
			// get the new search
			$answer = $request->query->get('answer');
			$nbQuestion = $request->query->get('nb');

			$terms = array();
			$newsSearch = array();

			// for all word, it's get term
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

	// add notice in your selection
	public function addfavoriteAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			// get id of notice 
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

	// funtcion to get notice
	public function noticeAction()
	{
		$request = $this->container->get('request');
 
		if($request->isXmlHttpRequest())
		{
			$id = $request->query->get('param');
			$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
			$notice = $em->find($id);

			$response['content'] = $this->renderView('JocondeLabBundle:Notice:view.html.twig', array("notice" => $notice));

			return new JsonResponse($response);
		}
	}

	// function to delete all yout selection
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

	// function to delete the notice that your choice
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

	// function to get all your selection
	public function favoriteAction()
	{
		$favorite = $this->get('flash.session_notice_manager')->getFavoris();

		if(count($favorite) !== 0 ) {
			$em = $this->getDoctrine()->getRepository('JocondeLabBundle:CoreNotice');
			$notices = $em->findById($favorite);
		} else {
			$notices = 0;
		}

		return $this->render('JocondeLabBundle:Notice:favorite.html.twig', array("notices" => $notices));
	}
}