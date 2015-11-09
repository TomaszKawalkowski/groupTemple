<?php

namespace TempleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use TempleBundle\Entity\Technology;
use TempleBundle\Entity\postsLecturers;
use TempleBundle\Entity\postStudents;
use TempleBundle\Entity\Bootcamp_name;

class TechnologyController extends Controller
{
    /**
     * @Route("/technologyPage/{id}", name = "technologyPage")
     * @Template()
     */
    public function technologyPageAction(Request $request, $id)
    {
        $postStudent = $this->get('doctrine')->getRepository('TempleBundle:postStudents')->findBytechnologyid($id);
        $postsLecturer = $this->get('doctrine')->getRepository('TempleBundle:postsLecturers')->findBytechnologyid($id);
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findByid($id);
        $users = $this->get('doctrine')->getRepository('AppBundle:User')->findall();
        return array(
            'postStudents' => $postStudent,
            'postsLecturers' => $postsLecturer,
            'technologyid' => $id,
            'technologyArrow' => $technologyArrow,
            'users' => $users
        );
    }

}
