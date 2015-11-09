<?php

namespace TempleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technology
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Technology
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     * @ORM\ManyToMany(targetEntity="fos_user", mappedBy="id")
     * @ORM\Column(name="Lecturer_Id", type="integer")
     */
    private $lecturerId;


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
     *
     * @return Technology
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
     * Set description
     *
     * @param string $description
     *
     * @return Technology
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lecturerId
     *
     * @param integer $lecturerId
     *
     * @return Technology
     */
    public function setLecturerId($lecturerId)
    {
        $this->lecturerId = $lecturerId;

        return $this;
    }

    /**
     * Get lecturerId
     *
     * @return integer
     */
    public function getLecturerId()
    {
        return $this->lecturerId;
    }
}

