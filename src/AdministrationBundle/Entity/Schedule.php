<?php

namespace AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity
 */
class Schedule
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
     * @var Slide
     *
     * @ORM\ManyToOne(targetEntity="Slide", inversedBy="schedule")
     * @ORM\JoinColumn(name="slide_id", referencedColumnName="id")
     */
    private $slide;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="week", type="integer", nullable=true)
     */
    private $week;

    /**
     * @var int
     *
     * @ORM\Column(name="month", type="integer", nullable=true)
     */
    private $month;

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
     * @return Slide
     */
    public function getSlide(): Slide
    {
        return $this->slide;
    }

    /**
     * @param Slide $slide
     * @return Schedule
     */
    public function setSlide(Slide $slide): Schedule
    {
        $this->slide = $slide;

        return $this;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Schedule
     */
    public function setType($type) : Schedule
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType() : int
    {
        return $this->type;
    }

    /**
     * Set week
     *
     * @param integer $week
     *
     * @return Schedule
     */
    public function setWeek($week) : Schedule
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return int
     */
    public function getWeek() : int
    {
        return $this->week;
    }

    /**
     * Set month
     *
     * @param integer $month
     *
     * @return Schedule
     */
    public function setMonth($month) : Schedule
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return int
     */
    public function getMonth() : int
    {
        return $this->month;
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

