<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Saison;

class SaisonController extends Controller
{
	
	public function acceuilSaisonAction()
    {
        return $this->render('OCPlatformBundle:Saison:saison.html.twig');
		
    }
	

	
	
	public function showsaisonAction()
	{
        $saison = new Saison();
		$saison->setTitre($_POST['titre']);
		$saison->setContenu($_POST['contenu']);
		$saison->setNumero($_POST['num']);
		
		$saison->setPhoto($_FILES['fichier']['name']);
		
		$dossier = 'images/upload/'; //Dossier ou l'on upload
		$fichier = basename($_FILES['fichier']['name']);
		$taille_maxi = 5000000;
		$taille = filesize($_FILES['fichier']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['fichier']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
			$erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			//On formate le nom du fichier ici...
			$fichier = strtr($fichier, 
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			//$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			//$fichier = "\\" . $fichier;
			if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				$titre= 'Upload effectué avec succès !';
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				$titre = 'Echec de l\'upload !';
			}
		}
		else
		{
			echo $erreur;
		}
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($saison);
		$em->flush();
		
		
	    
		
		
		//$titre = $this->getDoctrine()->getRepository('OCPlatformBundle:Saison')->findAll();
		
		return $this->redirect($this->generateUrl('article_saison', array('id'=>$saison->getId())));

		exit;
	}
	
	
	public function fillsaisonAction()
    {
        return $this->render('OCPlatformBundle:Saison:ajout_saison.html.twig');
		
    }
	
	public function saisonAction($id){
		
		$saison = $this->getDoctrine()->getRepository('OCPlatformBundle:Saison')->find($id);
		
		return $this->render('OCPlatformBundle:Saison:article_saison.html.twig', array('title'=>$saison->getTitre(),'contenu'=>$saison->getContenu(),'lien'=>$saison->getPhoto(),'id'=>$saison->getId()));
		
	}
	
	public function saisonXAction($numero){
		
			$titre = $this->getDoctrine()->getRepository('OCPlatformBundle:Saison')->findAll();
		
		return $this->render('OCPlatformBundle:Saison:liste_saison.html.twig', array('titre' => $titre,'numero'=> $numero));
		
	}
	
		
	
	
	public function initModifsaisonAction($id)
	{
		
		$saison = $this->getDoctrine()->getRepository('OCPlatformBundle:Saison')->find($id);
		
		return $this->render('OCPlatformBundle:Saison:saison_modif.html.twig', array('title' => $saison->getTitre(),'contenu' => $saison->getContenu(), 'lien' => $saison->getPhoto(),'id' => $saison->getId()));
		exit;

	}
	
	
public function modifSaisonAction($id)
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$saison = $this->getDoctrine()->getRepository('OCPlatformBundle:Saison')->find($id);
				$saison->setTitre($_POST['title']);
		$saison->setContenu($_POST['contenu']);

		if($_FILES['fichier']['name']!=null) {
		$saison->setPhoto($_FILES['fichier']['name']);
		
		$dossier = 'images/upload/'; //Dossier ou l'on upload
		$fichier = basename($_FILES['fichier']['name']);
		$taille_maxi = 5000000;
		$taille = filesize($_FILES['fichier']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['fichier']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
			$erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			//On formate le nom du fichier ici...
			$fichier = strtr($fichier, 
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			//$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			//$fichier = "\\" . $fichier;
			if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				$titre= 'Upload effectué avec succès !';
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				$titre = 'Echec de l\'upload !';
			}
		}
		else
		{
			echo $erreur;
		}
		}
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($saison);
		$em->flush();
		
		
		
		return $this->redirect($this->generateUrl('article_saison', array('id'=>$saison->getId())));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function supprimerAction($id)
{
	
  $em = $this->getDoctrine()->getEntityManager();
 
        $episode = $em->find('OCPlatformBundle:Saison', $id); //recupere la ligne que l'ont veur supprimer grâce a son id
		
	$numero=$episode->getNumero(); //recupere le numero de la saison de la ligne que l'on va supprimer
			
		
  $em->remove($episode); //suprimme la ligne
  $em->flush();        //commit

	return $this->redirect($this->generateUrl('affiche_saison_num', array('numero'=>$numero))); //appele le fichier qui affiche la liste de la saison correspondant a numero
}










}
?>