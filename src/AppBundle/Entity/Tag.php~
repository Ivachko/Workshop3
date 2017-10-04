<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
 	   *
     * @ORM\ManyToMany(targetEntity="Need", mappedBy="tags")
     */
    private $needs;

    /**
 	   *
     * @ORM\ManyToMany(targetEntity="Developpeur", mappedBy="tags")
	   */
    private $developpeurs;

    /**
     * Constructor
     */
    public function __construct()
	  {
	     $this->needs = new ArrayCollection();
       $this->developpeurs = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Tag
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add need
     *
     * @param \AppBundle\Entity\Need $need
     *
     * @return Tag
     */
    public function addNeed(\AppBundle\Entity\Need $need)
    {
        $this->needs[] = $need;

        return $this;
    }

    /**
     * Remove need
     *
     * @param \AppBundle\Entity\Need $need
     */
    public function removeNeed(\AppBundle\Entity\Need $need)
    {
        $this->needs->removeElement($need);
    }

    /**
     * Get needs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNeeds()
    {
        return $this->needs;
    }

    /**
     * Add developpeur
     *
     * @param \AppBundle\Entity\Developpeur $developpeur
     *
     * @return Tag
     */
    public function addDeveloppeur(\AppBundle\Entity\Developpeur $developpeur)
    {
        $this->developpeurs[] = $developpeur;

        return $this;
    }

    /**
     * Remove developpeur
     *
     * @param \AppBundle\Entity\Developpeur $developpeur
     */
    public function removeDeveloppeur(\AppBundle\Entity\Developpeur $developpeur)
    {
        $this->developpeurs->removeElement($developpeur);
    }

    /**
     * Get developpeurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeveloppeurs()
    {
        return $this->developpeurs;
    }
}
