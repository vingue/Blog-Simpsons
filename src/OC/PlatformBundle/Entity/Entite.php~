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
 
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50)
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
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set poseur
     *
     * @param string $poseur
     *
     * @return Entite
     */
    
	public function __construct()
	{
		$this->title = "Titre article";
		$this->contenu= "Contenu article";
		//$this->budget = 0;
	}
}
