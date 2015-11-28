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
	
	public function okayAction()
    {
        return $this->render('OCPlatformBundle:Default:okay.html.twig');
		
    }
	
	
	
	
	
	
	
	
	public function formulaireAction()
    {
        return $this->render('OCPlatformBundle:Default:ajout.html.twig');
		
    }
	
	
	
public function articleAction($id)
	{		
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Ent')->find($id);
		
		$titre = $ent->getTitle();
		
		$contenu = $ent->getContenu();
		
		$url = "/symfony/web/images/upload/".$ent->getPhoto(); //Donne chemin ou chercher l'image + son nom
		
		
		return $this->render('OCPlatformBundle:Default:article.html.twig', array('title' => $titre,'contenu' => $contenu, 'lien' => $url));
		
		

		exit;
	}
	
	public function ajoutAction()
	{
		$ent = new Ent();
		$ent->setTitle($_POST['title']);
		$ent->setContenu($_POST['contenu']);
		$ent->setPhoto($_FILES['fichier']['name']);
		
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
		$em->persist($ent);
		$em->flush();
		
		return $this->redirect($this->generateUrl('article_affiche', array('id'=>$ent->getId())));
	}
	
	public function InitModifierAction($id)
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Ent')->find($id);
		$url = "/symfony/web/images/upload/".$ent->getPhoto();
		return $this->render('OCPlatformBundle:Default:modif.html.twig', array('title' => $ent->getTitle(),'contenu' => $ent->getContenu(), 'lien' => $url, 'id' => $ent->getId()));
		exit;

	}
	
	public function ModifierAction($id)
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Ent')->find($id);
				$ent->setTitle($_POST['title']);
		$ent->setContenu($_POST['contenu']);
		//$file=$ent->getPhoto();
		if($_FILES['fichier']['name']!=null) {
		$ent->setPhoto($_FILES['fichier']['name']);
		
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
		$em->persist($ent);
		$em->flush();
		
		
		
		return $this->redirect($this->generateUrl('article_affiche', array('id'=>$ent->getId())));
	}
	
	
	public function supprimerAction($id)
{
  $em = $this->getDoctrine()->getEntityManager();
  $acteur = $em->find('OCPlatformBundle:Ent', $id);
        
  $em->remove($acteur);
  $em->flush();        

	return $this->redirect($this->generateUrl('projet_afficheDure'));
}
	
	public function listAfficheAction()
	{
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Ent')->findAll();
		return $this->render('OCPlatformBundle:Default:projet_affiche_tous.html.twig', array('projects' => $ent));
		exit;

	}
	
	
}
?>