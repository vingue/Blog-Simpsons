<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ent
 *
 * @ORM\Table(name="ent")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\EntiteRepository")
 */
class Ent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	
	
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    
	
	/**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=500)
     */
    private $contenu;
	
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="photo", type="text")
     */
    private $photo;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Ent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Ent
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }
	
	/**
     * Set photo
     *
     * @param string $photo
     *
     * @return Entite
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }
	
	public function __construct()
	{
		$this->title = "titre";
		$this->contenu= "inconnu";
		$this->photo= "default.jpg";
		
	}
}

