<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entite
 *
 * @ORM\Table(name="desk")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\EntiteRepository")
 */
class Entite
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
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="poseur", type="string", length=50)
     */
    private $poseur;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var integer
     *
     * @ORM\Column(name="budget", type="integer")
     */
    private $budget;
	
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
     * @return Entite
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
     * Set type
     *
     * @param string $type
     *
     * @return Entite
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set poseur
     *
     * @param string $poseur
     *
     * @return Entite
     */
    public function setPoseur($poseur)
    {
        $this->poseur = $poseur;

        return $this;
    }

    /**
     * Get poseur
     *
     * @return string
     */
    public function getPoseur()
    {
        return $this->poseur;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Entite
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Entite
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     *
     * @return Entite
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return integer
     */
    public function getBudget()
    {
        return $this->budget;
    }
	
	public function __construct()
	{
		$this->title = "Titre du projet";
		$this->type = "Inconnu";
		$this->poseur = "Inconnu";
		$this->categorie  = "Non définie";
		$this->summary = "Pas de description";
		$this->budget = 0;
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
}
