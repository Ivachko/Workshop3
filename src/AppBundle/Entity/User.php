<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="nom",type="string")
     */
    private $nom;
    /**
     * @ORM\Column(name="prenom",type="string")
     */
    private $prenom;

    public function __construct()
    {
        $this->features = new ArrayCollection();
        parent::__construct();

    }
    /**
     * One client has Many needs.
     * @OneToMany(targetEntity="Need", mappedBy="commercial")
     */
    private $needs;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Add need
     *
     * @param \AppBundle\Entity\Need $need
     *
     * @return User
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
