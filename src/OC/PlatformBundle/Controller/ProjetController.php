<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use OC\PlatformBundle\Entity\Entite;

class ProjetController extends Controller
{

    public function ajoutAction()
    {
        return $this->render('OCPlatformBundle:Default:projet_ajout.html.twig');
		
    }
	
	public function afficheAction($name)
    {
        return $this->render('OCPlatformBundle:Default:projet_affiche.html.twig', array('name' => $name));
    }
	
	public function modifAction($name)
    {
        return $this->render('OCPlatformBundle:Default:projet_modif.html.twig', array('name' => $name));
    }
	
	public function suppAction($name)
    {
        return $this->render('OCPlatformBundle:Default:projet_supp.html.twig', array('name' => $name));
    }
	
	public function testAjoutAction()
	{
		$desk = new Entite();
		$desk->setTitle("Mon projet");
		$desk->setType("Ecole");
		$desk->setPoseur("Moi");
		$desk->setCategorie("Web");
		$desk->setSummary("Projet web pour Paritek");
		$desk->setBudget(250);

		echo "Création du projet: ".$desk->getTitle();
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($desk);
		$em->flush();
		
		echo "<br/>Le projet a été enregistré en BDD avec l'ID: ".$desk->getId();
		exit;
	}
	
	public function ajoutUserAction()
	{
		$desk = new Entite();
		$desk->setTitle($_POST['title']);
		$desk->setType($_POST['type']);
		$desk->setPoseur($_POST['poseur']);
		$desk->setCategorie($_POST['categorie']);
		$desk->setSummary($_POST['summary']);
		$desk->setBudget($_POST['budget']);
		$desk->setPhoto($_FILES['fichier']['name']);
		
		$dossier = 'upload/';
$fichier = basename($_FILES['fichier']['name']);
$taille_maxi = 100000;
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
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	 $fichier = "\\" . $fichier;
     if(move_uploaded_file($_FILES['fichier']['tmp_name'], "C:\wamp\www\Symfony\web\images" . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}

		echo "Création du projet: ".$desk->getTitle();
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($desk);
		$em->flush();
		
		echo "<br/>Le projet a été enregistré en BDD avec l'ID: ".$desk->getId(). " et le fichier: ".$desk->getPhoto();
		exit;
	}
	
	public function testAfficheAction()
	{
		$ent = $this->getDoctrine()->getRepository('OCPlatformBundle:Ent')->findAll();
		return $this->render('OCPlatformBundle:Default:projet_affiche_tous.html.twig', array('projects' => $ent));
		exit;

	}
}
?>