<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $logo;

    /**
     * @var int
     *
     * @ORM\Column(name="Siret", type="string",length=15)
     */
    private $siret;

    /**
     * One client has Many needs.
     * @OneToMany(targetEntity="Need", mappedBy="client")
     */
    private $needs;

    public function __construct() {
        $this->features = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Client
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     *
     * @return Client
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Add need
     *
     * @param \AppBundle\Entity\Need $need
     *
     * @return Client
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
}
