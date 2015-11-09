<?php

namespace TempleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BootcampInfoController extends Controller
{
    /**
     * @Route("/BootcampInfo")
     * @Template()
     */
    public function BootcampInfoAction()
    {
        $bootCampInfo = $this->get('doctrine')->getRepository('TempleBundle:Bootcamp_name')->findAll();
        return
            array(

                'boot' => $bootCampInfo
            );

    }
}