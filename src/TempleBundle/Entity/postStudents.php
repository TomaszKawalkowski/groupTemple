<?php

namespace TempleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * postStudents
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class postStudents
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
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer")
     */
    private $userid;

    /**
     * @var integer
     *@ORM\OneToOne(targetEntity="Technology", mappedBy="id")
     * @ORM\Column(name="technologyid", type="integer")
     */
    private $technologyid;

    /**
     * @var \DateTime
     * @ORM\OneToOne(targetEntity="User", mappedBy="id")
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set userid
     *
     * @param integer $userid
     *
     * @return postStudents
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return postStudents
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return postStudents
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set technologyid
     *
     * @param integer $technologyid
     *
     * @return postStudents
     */
    public function setTechnologyid($technologyid)
    {
        $this->technologyid = $technologyid;

        return $this;
    }

    /**
     * Get technologyid
     *
     * @return integer
     */
    public function getTechnologyid()
    {
        return $this->technologyid;
    }
}
