<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Personnage;

class PersoController extends Controller
{
	
	public function acceuilPersoAction()
    {
        return $this->render('OCPlatformBundle:Perso:perso.html.twig');
		
    }
	

	
	
	public function showPersoAction()
	{
        $perso = new Personnage();
		$perso->setTitre($_POST['titre']);
		$perso->setContenu($_POST['contenu']);
		$perso->setNumero($_POST['num']);
		
		$perso->setPhoto($_FILES['fichier']['name']);
		
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
		$em->persist($perso);
		$em->flush();
		
		
	    
		
		
		//$titre = $this->getDoctrine()->getRepository('OCPlatformBundle:Personnage')->findAll();
		
		return $this->redirect($this->generateUrl('article_perso', array('id'=>$perso->getId())));

		exit;
	}
	
	
	public function fillPersoAction()
    {
        return $this->render('OCPlatformBundle:Perso:ajout_perso.html.twig');
		
    }
	
	public function persoAction($id){
		
		$perso = $this->getDoctrine()->getRepository('OCPlatformBundle:Personnage')->find($id);
		
		return $this->render('OCPlatformBundle:Perso:article_perso.html.twig', array('title'=>$perso->getTitre(),'contenu'=>$perso->getContenu(),'lien'=>$perso->getPhoto(),'id'=>$perso->getId()));
		
	}
	
	public function persoListAction($numero){
		
			$titre = $this->getDoctrine()->getRepository('OCPlatformBundle:Personnage')->findAll();
		
		return $this->render('OCPlatformBundle:Perso:liste_perso.html.twig', array('titre' => $titre,'numero'=>$numero));
		
	}
		
	
	
	public function initModifPersoAction($id)
	{
		
		$perso = $this->getDoctrine()->getRepository('OCPlatformBundle:Personnage')->find($id);
		
		return $this->render('OCPlatformBundle:Perso:perso_modif.html.twig', array('title' => $perso->getTitre(),'contenu' => $perso->getContenu(), 'lien' => $perso->getPhoto(),'id' => $perso->getId()));
		exit;

	}
	
	
public function modifPersoAction($id)
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$perso = $this->getDoctrine()->getRepository('OCPlatformBundle:Personnage')->find($id);
				$perso->setTitre($_POST['title']);
		$perso->setContenu($_POST['contenu']);

		if($_FILES['fichier']['name']!=null) {
		$perso->setPhoto($_FILES['fichier']['name']);
		
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
		$em->persist($perso);
		$em->flush();
		
		
		
		return $this->redirect($this->generateUrl('article_perso', array('id'=>$perso->getId())));
	}

public function supprimerAction($id)
{
	
	
	
  $em = $this->getDoctrine()->getEntityManager();
 
        $personnage = $em->find('OCPlatformBundle:Personnage', $id); //recupere la ligne que l'ont veur supprimer grâce a son id
		
	$numero=$personnage->getNumero(); //recupere le numero de la saison de la ligne que l'on va supprimer
			
		
  $em->remove($personnage); //suprimme la ligne
  $em->flush();        //commit

	return $this->redirect($this->generateUrl('affiche_perso_list', array('numero'=>$numero))); //appele le fichier qui affiche la liste de la saison correspondant a numero
}


}
?>