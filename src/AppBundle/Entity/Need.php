<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Need
 *
 * @ORM\Table(name="need")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NeedRepository")
 */
class Need
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * Many Need have One Contact.
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="needs")
     * @ORM\JoinColumn(name="contactName", referencedColumnName="id")
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="fullDescription", type="text")
     */
    private $fullDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartAt", type="date")
     */
    private $startAt;

    /**
     * @var string
     *
     * @ORM\Column(name="Road", type="string", length=255)
     */
    private $road;
    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;
    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=255)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="Rate", type="string", length=255)
     */
    private $rate;



    /**
     * @var int
     *
     * @ORM\Column(name="Status", type="integer")
     */
    private $status;

    /**
     * Many Need have One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="needs")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */

    private $client;
    /**
     * Many Need have One .
     * @ORM\ManyToOne(targetEntity="User", inversedBy="needs")
     * @ORM\JoinColumn(name="commerical_id", referencedColumnName="id")
     */

    private $commercial;
    /**
     * @var string
     *
     * @ORM\Column(name="factor1", type="text")
     */
    private $factor1;
    /**
     * @var string
     *
     * @ORM\Column(name="factor2", type="text")
     */
    private $factor2;
    /**
     * @var string
     *
     * @ORM\Column(name="factor3", type="text")
     */
    private $factor3;


    /**
     * Many Entity have Many Tag.
     * @ManyToMany(targetEntity="Tag")
     * @JoinTable(name="need_tag",
     *      joinColumns={@JoinColumn(name="need_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $tags;

    // ...

    public function __construct() {

        $this->tags = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Need
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     *
     * @return Need
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Need
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
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return Need
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     *
     * @return Need
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }



    /**
     * Set rate
     *
     * @param string $rate
     *
     * @return Need
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }



    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Need
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set road
     *
     * @param string $road
     *
     * @return Need
     */
    public function setRoad($road)
    {
        $this->road = $road;

        return $this;
    }

    /**
     * Get road
     *
     * @return string
     */
    public function getRoad()
    {
        return $this->road;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Need
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Need
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Need
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set commercial
     *
     * @param \AppBundle\Entity\User $commercial
     *
     * @return Need
     */
    public function setCommercial(\AppBundle\Entity\User $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \AppBundle\Entity\User
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * Set factor1
     *
     * @param string $factor1
     *
     * @return Need
     */
    public function setFactor1($factor1)
    {
        $this->factor1 = $factor1;

        return $this;
    }

    /**
     * Get factor1
     *
     * @return string
     */
    public function getFactor1()
    {
        return $this->factor1;
    }

    /**
     * Set factor2
     *
     * @param string $factor2
     *
     * @return Need
     */
    public function setFactor2($factor2)
    {
        $this->factor2 = $factor2;

        return $this;
    }

    /**
     * Get factor2
     *
     * @return string
     */
    public function getFactor2()
    {
        return $this->factor2;
    }

    /**
     * Set factor3
     *
     * @param string $factor3
     *
     * @return Need
     */
    public function setFactor3($factor3)
    {
        $this->factor3 = $factor3;

        return $this;
    }

    /**
     * Get factor3
     *
     * @return string
     */
    public function getFactor3()
    {
        return $this->factor3;
    }



    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Need
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
