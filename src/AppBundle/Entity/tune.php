<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tune
 *
 * @ORM\Table(name="tune")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\tuneRepository")
 */
class tune
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;
    
      /**
     * @var string
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
     
    private $title;
    
    
     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\artist")
     */
    private $artist;
    


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
     * @return tune
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
     * Set artist
     *
     * @param \AppBundle\Entity\artist $artist
     * @return tune
     */
    public function setArtist(\AppBundle\Entity\artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \AppBundle\Entity\artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return tune
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
