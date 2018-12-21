<?php

namespace AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slide
 *
 * @ORM\Table(name="slide", indexes={@ORM\Index(name="fk_updated_by_idx", columns={"updated_by"}), @ORM\Index(name="fk_created_by_idx", columns={"created_by"})})
 * @ORM\Entity(repositoryClass="\AdministrationBundle\Repository\SlideRepository")
 */
class Slide implements \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="period_of_validity", type="integer", nullable=false)
     */
    private $periodOfValidity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     * })
     */
    private $updatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="slides")
     * @ORM\JoinTable(name="slides_tags")
     */
    private $tags;

    /**
     * @var integer
     *
     * @ORM\Column(name="step", type="integer", nullable=false)
     */
    private $step;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="active_time_start", type="datetime", nullable=false)
     */
    private $activeTimeStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="active_time_end", type="datetime", nullable=false)
     */
    private $activeTimeEnd;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="slide")
     */
    private $schedule;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schedule = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Slide
     */
    public function setName(string $name): Slide
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodOfValidity(): ?int
    {
        return $this->periodOfValidity;
    }

    /**
     * @param integer $periodOfValidity
     * @return Slide
     */
    public function setPeriodOfValidity($periodOfValidity): Slide
    {
        $this->periodOfValidity = $periodOfValidity;

        return $this;
    }

    /**
     * @param \DateTime $startDate
     * @return Slide
     */
    public function setStartDate(\DateTime $startDate): Slide
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $endDate
     * @return Slide
     */
    public function setEndDate(\DateTime $endDate): Slide
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    /**
     * @return bool
     */
    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return Slide
     */
    public function setEnabled(bool $enabled): Slide
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Slide
     */
    public function setContent(string $content): Slide
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Slide
     */
    public function setCreatedAt(\DateTime $createdAt): Slide
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Slide
     */
    public function setUpdatedAt(\DateTime $updatedAt): Slide
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return User
     */
    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    /**
     * @param User $createdBy
     * @return Slide
     */
    public function setCreatedBy(User $createdBy): Slide
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return User
     */
    public function getUpdatedBy(): User
    {
        return $this->updatedBy;
    }

    /**
     * @param User $updatedBy
     * @return Slide
     */
    public function setUpdatedBy(User $updatedBy): Slide
    {
        $this->updatedBy = $updatedBy;
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
     * @return Slide
     */
    public function setTags(\Doctrine\Common\Collections\Collection $tags): Slide
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return int
     */
    public function getStep(): ?int
    {
        return $this->step;
    }

    /**
     * @param int $step
     *
     * @return Slide
     */
    public function setStep(int $step): Slide
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActiveTimeStart(): ?\DateTime
    {
        return $this->activeTimeStart;
    }

    /**
     * @param \DateTime $active_time_start
     *
     * @return Slide
     */
    public function setActiveTimeStart(\DateTime $active_time_start): Slide
    {
        $this->activeTimeStart = $active_time_start;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActiveTimeEnd(): ?\DateTime
    {
        return $this->activeTimeEnd;
    }

    /**
     * @param \DateTime $active_time_end
     *
     * @return Slide
     */
    public function setActiveTimeEnd(\DateTime $active_time_end): Slide
    {
        $this->activeTimeEnd = $active_time_end;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchedule(): \Doctrine\Common\Collections\Collection
    {
        return $this->schedule;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $schedule
     * @return Slide
     */
    public function setSchedule(\Doctrine\Common\Collections\Collection $schedule): Slide
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'content' => $this->content
        ];
    }
}
