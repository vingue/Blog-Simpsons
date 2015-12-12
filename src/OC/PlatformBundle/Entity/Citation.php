<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citation
 *
 * @ORM\Table(name="cite")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\EntiteRepository")
 */
class Citation
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
     * @ORM\Column(name="citation", type="string", length=255)
     */
    private $citation;

    /**
     * @var string
     *
     * @ORM\Column(name="personnage", type="string", length=255)
     */
    private $personnage;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;


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
     * Set citation
     *
     * @param string $citation
     *
     * @return Citation
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * Get citation
     *
     * @return string
     */
    public function getCitation()
    {
        return $this->citation;
    }

    /**
     * Set personnage
     *
     * @param string $personnage
     *
     * @return Citation
     */
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get personnage
     *
     * @return string
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Citation
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
	
	public function __construct()
	{
		$this->citation = "inconnu";
		$this->personnage= "inconnu";
		$this->source= "inconnu";
		
	}
}

