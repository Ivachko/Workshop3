<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacteurKey
 *
 * @ORM\Table(name="facteur_key")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FacteurKeyRepository")
 */
class FacteurKey
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
     * @ORM\Column(name="factor", type="text")
     */
    private $factor;


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
     * Set factor
     *
     * @param string $factor
     *
     * @return FacteurKey
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return string
     */
    public function getFactor()
    {
        return $this->factor;
    }
}
