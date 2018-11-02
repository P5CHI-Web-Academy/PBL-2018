<?php

namespace AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", uniqueConstraints={@ORM\UniqueConstraint(name="location_UNIQUE", columns={"location"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=45, nullable=false)
     */
    private $location;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Slide", mappedBy="locations")
     */
    private $slides;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slides = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return Location
     */
    public function setLocation(string $location): Location
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlides(): \Doctrine\Common\Collections\Collection
    {
        return $this->slides;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $slides
     * @return Location
     */
    public function setSlides(\Doctrine\Common\Collections\Collection $slides): Location
    {
        $this->slides = $slides;

        return $this;
    }
}

