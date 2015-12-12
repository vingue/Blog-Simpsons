<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Ent;

class SimpsonController extends Controller
{
	
	public function afficheAction()
    {
        return $this->render('OCPlatformBundle:Default:acceuil.html.twig');
    }
	

}
?>