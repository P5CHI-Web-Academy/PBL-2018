<?php

namespace AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule", uniqueConstraints={@ORM\UniqueConstraint(name="day_UNIQUE", columns={"day"})})
 * @ORM\Entity
 */
class Schedule
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Slide", mappedBy="schedule")
     */
    private $slides;


    /**
     * @var int
     *
     * @ORM\Column(name="day", type="integer", nullable=true)
     */
    private $day;


    /**
     * Get id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlides(): Slide
    {
        return $this->slides;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $slide
     * @return Schedule
     */
    public function setSlides(Slide $slide): Schedule
    {
        $this->slides = $slide;

        return $this;
    }

    /**
     * Set day
     *
     * @param integer $day
     *
     * @return Schedule
     */
    public function setDay($day) : Schedule
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay() : int
    {
        return $this->day;
    }
}

