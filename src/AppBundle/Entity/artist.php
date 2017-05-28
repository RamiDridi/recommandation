<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\artistRepository")
 */
class artist
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
     * @ORM\Column(name="name", type="string", length=150, nullable=false)  
     */
     
    private $name;
    
    

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
     * Set name
     *
     * @param string $name
     * @return artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return artist
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
