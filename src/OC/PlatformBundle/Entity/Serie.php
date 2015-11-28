<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\EntiteRepository")
 */
class Serie
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
     * @ORM\Column(name="contenu", type="string", length=500)
     */
    private $contenu;
	
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="photo1", type="text")
     */
    private $photo1;
	
	/**
     * @var string
     *
     * @ORM\Column(name="photo2", type="text")
     */
    private $photo2;
	
	/**
     * @var string
     *
     * @ORM\Column(name="photo3", type="text")
     */
    private $photo3;


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
     * Set photo1
     *
     * @param string $photo
     *
     * @return Entite
     */
    public function setPhoto1($photo)
    {
        $this->photo1 = $photo;

        return $this;
    }

    /**
     * Get photo1
     *
     * @return string
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }
	
	
	
	/**
     * Set photo2
     *
     * @param string $photo
     *
     * @return Entite
     */
    public function setPhoto2($photo)
    {
        $this->photo2 = $photo;

        return $this;
    }

    /**
     * Get photo2
     *
     * @return string
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }
	
	
	/**
     * Set photo3
     *
     * @param string $photo
     *
     * @return Entite
     */
    public function setPhoto3($photo)
    {
        $this->photo3 = $photo;

        return $this;
    }

    /**
     * Get photo3
     *
     * @return string
     */
    public function getPhoto3()
    {
        return $this->photo3;
    }
	
	public function __construct()
	{
		$this->contenu= "inconnu";
		$this->photo1= "default.jpg";
		$this->photo2= "default.jpg";
		$this->photo3= "default.jpg";
		
	}
}

