<?php

namespace TempleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bootcamp_name
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bootcamp_name
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

     /**
     * @var string
     * @ORM\Column(name="mainLecturer", type="string")
     */
    private $mainLecturer;


    /**
     * Get id
     * @
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
     *
     * @return Bootcamp_name
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Bootcamp_name
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Bootcamp_name
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set mainLecturer
     *
     * @param integer $mainLecturer
     *
     * @return Bootcamp_name
     */
    public function setMainLecturer($mainLecturer)
    {
        $this->mainLecturer = $mainLecturer;

        return $this;
    }

    /**
     * Get mainLecturer
     *
     * @return integer
     */
    public function getMainLecturer()
    {
        return $this->mainLecturer;
    }
}

