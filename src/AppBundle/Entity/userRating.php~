<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * userRating
 *
 * @ORM\Table(name="user_rating")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\userRatingRepository")
 */
class userRating
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
     * @ORM\Column(name="rating", type="integer")
     */
     
    private $rating;
    
    
     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\user")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\tune")
     */
    private $tune;
    
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
     * Set rating
     *
     * @param integer $rating
     * @return userRating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\user $user
     * @return userRating
     */
    public function setUser(\AppBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\user 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set tune
     *
     * @param \AppBundle\Entity\tune $tune
     * @return userRating
     */
    public function setTune(\AppBundle\Entity\tune $tune = null)
    {
        $this->tune = $tune;

        return $this;
    }

    /**
     * Get tune
     *
     * @return \AppBundle\Entity\tune 
     */
    public function getTune()
    {
        return $this->tune;
    }
}
