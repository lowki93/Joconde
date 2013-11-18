<?php

namespace Joconde\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JocondeLabBundle:Default:index.html.twig', array('name' => $name));
    }
}
