<?php

namespace Joconde\LabBundle\FlashSessionNotice;

/**
* 
*/
class FlashSessionNoticeManager
{

    private $session;
    public $tabQuest;
    public $jocondeQuest, $testQuest;
    public $nbQuestion;

    public function __construct($session)
    {
        $this->session = $session;
        $this->jocondeQuest = array("est-ce une tableau,tableau,1", "est-ce un peinture,peinture,2", "ce tableau représente-t-il mona lisa,mona lisa,3", "est-ce l'oeuvre que vous recherchez");
        $this->testQuest = array('test');
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
        } 
        else {
            $this->session->set('question', $this->testQuest);
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