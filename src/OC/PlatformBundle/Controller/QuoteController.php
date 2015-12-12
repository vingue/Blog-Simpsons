<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Citation;

class QuoteController extends Controller
{
	
	
public function showQuoteAction()
	{
        $cite = new Citation();
		$cite->setCitation($_POST['citation']);
		$cite->setPersonnage($_POST['personnage']);
		$cite->setSource($_POST['source']);
		
		
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($cite);
		$em->flush();
		
		return $this->redirect($this->generateURL('affiche_quote'));

		exit;
	}
	
	
	public function fillQuoteAction()
    {
        return $this->render('OCPlatformBundle:Quote:ajout_citation.html.twig');
		
    }
	
	public function quoteAction(){
		
		$citation = $this->getDoctrine()->getRepository('OCPlatformBundle:Citation')->findAll();
		
		return $this->render('OCPlatformBundle:Quote:article_citation.html.twig', array('citation' => $citation));
		
	}
	
	
	public function supprimerAction($id)
{
	
	
	
  $em = $this->getDoctrine()->getEntityManager();
 
        $quote= $em->find('OCPlatformBundle:Citation', $id); //recupere la ligne que l'ont veur supprimer grâce a son id
			
  $em->remove($quote); //suprimme la ligne
  $em->flush();        //commit

  $citation = $this->getDoctrine()->getRepository('OCPlatformBundle:Citation')->findAll(); //regenere la liste mais sans l'element que l'on vien de supprimer

	return $this->redirect($this->generateURL('affiche_quote')); //appele le fichier qui affiche la liste de la saison correspondant a numero
}

}
?>