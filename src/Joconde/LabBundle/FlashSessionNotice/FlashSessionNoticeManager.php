<?php

namespace Joconde\LabBundle\FlashSessionNotice;

/**
* 
*/
class FlashSessionNoticeManager
{

	private $session;
	public $tabQuest;
	public $jocondeQuest, $saintPaul, $botticelli, $default;
	public $nbQuestion;
	public $oeuvre = "est-ce l'oeuvre que vous recher-chez";

	public function __construct($session)
	{
		$this->session = $session;
		$this->jocondeQuest = array("est-ce un tableau,tableau,1", "est-ce un peinture,peinture,2", "ce tableau représente -t-il mona lisa,mona lisa,3", $this->oeuvre);
		$this->saintPaul = array("y a-t-il des animaux représen-tés,animaux,1","Figure-t-il un homme sur la peinture,homme,2","est-ce une oeuvre du 19e,19e,3","y a-t-il un hopital représenté,hopital,4",$this->oeuvre);
		$this->botticelli = array("est-ce une allégorie de l'automne,allégorie,1",$this->oeuvre);
		$this->default = array("est-ce une sculpture,scupture,1","est-ce une peinture,peinture,2");
	}

	public function setFavoris($id)
	{
		$favoris = $this->session->get('favoris');
		if (in_array($id, (array)$favoris)) {
			throw new \Exception("Already in session", 1);
		} else {
			$favoris[] = $id;
			$favoris = $this->session->set('favoris', $favoris);
		} 
	}

	public function getFavoris()
	{
		return $this->session->get('favoris');
	}

	public function deleteOneFavoris($id)
	{   
		$favoris = $this->session->get('favoris');
		if( in_array($id, (array)$favoris) ){

			$place = array_search($id, $favoris);
			unset ($favoris[$place]);
			$favoris = $this->session->set('favoris', $favoris);

		};
	}

	public function deleteAllFavoris()
	{
		$favoris[] = null;
		$favoris = $this->session->set('favoris', $favoris);
	}

	public function getSessionQuestion()
	{
		return $this->session->get('question');
	}

	public function setQuestion($question)
	{
		$this->session->remove('question');
		if($question == "16e") {
			$this->session->set('question', $this->jocondeQuest);
			$this->tabQuest = $this->jocondeQuest;
			return $this->tabQuest[0];
		} else if($question == "arbre peinture") {
			$this->session->set('question', $this->saintPaul);
			$this->tabQuest = $this->saintPaul;
			return $this->tabQuest[0];
		} else if($question == "botticelli enfant 15e") {
			$this->session->set('question', $this->botticelli);
			$this->tabQuest = $this->botticelli;
			return $this->tabQuest[0];
		} else {
			$this->tabQuest = $this->default;
			return $this->tabQuest[0];
		}
	}

	public function getQuestion($nbQuestion)
	{   
		//die("nb : ".$nbQuestion);
		// $this->nbQuestion = $nbQuestion;
		$this->tabQuest = $this->getSessionQuestion();
		return $this->tabQuest[(int)$nbQuestion];
	}
} 