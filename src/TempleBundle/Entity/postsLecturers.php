<?php

namespace TempleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * postsLecturers
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class postsLecturers
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
     *@ORM\OneToOne(targetEntity="User", mappedBy="id")
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
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editdatetime", type="datetime", nullable = true)
     */
    private $editdatetime;

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
     * @return postsLecturers
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
     * @return postsLecturers
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Set editdatetime
     *
     * @param \DateTime $editdatetime
     *
     * @return postsLecturers
     */
    public function setEditdatetime($editdatetime)
    {
        $this->editdatetime = $editdatetime;

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
     * Get editdatetime
     *
     * @return \DateTime
     */
    public function getEditdatetime()
    {
        return $this->datetime;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return postsLecturers
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
     * @return postsLecturers
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
