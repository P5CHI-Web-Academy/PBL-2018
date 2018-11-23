<?php

namespace AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", uniqueConstraints={@ORM\UniqueConstraint(name="tag_UNIQUE", columns={"tag"})})
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="tag", type="string", length=45, nullable=false)
     */
    private $tag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Slide", mappedBy="tags")
     */
    private $slides;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Location", mappedBy="tags")
     */
    private $locations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slides = new \Doctrine\Common\Collections\ArrayCollection();
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     * @return Tag
     */
    public function setTag(string $tag): Tag
    {
        $this->tag = $tag;

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
     * @return Tag
     */
    public function setSlides(\Doctrine\Common\Collections\Collection $slides): Tag
    {
        $this->slides = $slides;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocations(): \Doctrine\Common\Collections\Collection
    {
        return $this->locations;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $locations
     * @return Tag
     */
    public function setLocations(\Doctrine\Common\Collections\Collection $locations): Tag
    {
        $this->locations = $locations;

        return $this;
    }

    public function __toString()
    {
        return $this->tag;
    }
}
