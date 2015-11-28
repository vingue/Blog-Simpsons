<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Serie;

class SerieController extends Controller
{

	
	
public function articleAction()
	{		
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Serie')->find(1);
		
		$contenu = $ent->getContenu();
		
		$url1 = $ent->getPhoto1(); //Donne chemin ou chercher l'image + son nom
		
		$url2 = $ent->getPhoto2(); //Donne chemin ou chercher l'image + son nom
		
		$url3 = $ent->getPhoto3(); //Donne chemin ou chercher l'image + son nom
		
		
		return $this->render('OCPlatformBundle:Serie:article.html.twig', array('contenu' => $contenu, 'lien1' => $url1, 'lien2' => $url2, 'lien3' => $url3));
		
		

		exit;
	}
	
	
	
	public function InitModifierAction()
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Serie')->find(1);
		$url1 = "/symfony/web/images/upload/".$ent->getPhoto1();
		$url2 = "/symfony/web/images/upload/".$ent->getPhoto2();
		$url3 = "/symfony/web/images/upload/".$ent->getPhoto3();
		return $this->render('OCPlatformBundle:Serie:modif.html.twig', array('contenu' => $ent->getContenu(), 'lien1' => $url1, 'lien2' => $url2, 'lien3' => $url3));
		exit;

	}
	
	public function ModifierAction()
	{
		// ID du bureau de test que l'on a enregistré précédemment
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Serie')->find(1);
		$ent->setContenu($_POST['contenu']);
		//$file=$ent->getPhoto();
		if($_FILES['fichier1']['name']!=null) {
		$ent->setPhoto1($_FILES['fichier1']['name']);
		
		$dossier = 'images/upload/'; //Dossier ou l'on upload
		$fichier = basename($_FILES['fichier1']['name']);
		$taille_maxi = 5000000;
		$taille = filesize($_FILES['fichier1']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['fichier1']['name'], '.'); 
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
			if(move_uploaded_file($_FILES['fichier1']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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
		
		
		
		if($_FILES['fichier2']['name']!=null) {
		$ent->setPhoto2($_FILES['fichier2']['name']);
		
		$dossier = 'images/upload/'; //Dossier ou l'on upload
		$fichier = basename($_FILES['fichier2']['name']);
		$taille_maxi = 5000000;
		$taille = filesize($_FILES['fichier2']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['fichier2']['name'], '.'); 
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
			if(move_uploaded_file($_FILES['fichier2']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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
		
		
		
		if($_FILES['fichier3']['name']!=null) {
		$ent->setPhoto3($_FILES['fichier3']['name']);
		
		$dossier = 'images/upload/'; //Dossier ou l'on upload
		$fichier = basename($_FILES['fichier3']['name']);
		$taille_maxi = 5000000;
		$taille = filesize($_FILES['fichier3']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['fichier3']['name'], '.'); 
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
			if(move_uploaded_file($_FILES['fichier3']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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
		
		
		
		return $this->redirect($this->generateUrl('serie_article'));
	}
	
	
}
?>