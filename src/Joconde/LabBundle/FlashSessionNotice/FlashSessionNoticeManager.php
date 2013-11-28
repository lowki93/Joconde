<?php

namespace Joconde\LabBundle\FlashSessionNotice;

/**
* 
*/
class FlashSessionNoticeManager
{

    private $session;

    public function __construct($session)
    {
        $this->session = $session;
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
} 