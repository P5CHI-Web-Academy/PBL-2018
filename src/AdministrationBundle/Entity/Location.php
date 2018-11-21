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
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="locations")
     * @ORM\JoinTable(name="locations_tags")
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getLocation(): ?string
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
    public function getTags(): \Doctrine\Common\Collections\Collection
    {
        return $this->tags;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $tags
     * @return Location
     */
    public function setTags(\Doctrine\Common\Collections\Collection $tags): Location
    {
        $this->tags = $tags;

        return $this;
    }
}