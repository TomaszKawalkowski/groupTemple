<?php

namespace TempleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MetaController extends Controller
{
    /**
     * @Route("/meta")
     * @Template()
     */
    public function metaAction()
    {
        $bootCampInfo = $this->get('doctrine')->getRepository('TempleBundle:Bootcamp_name')->findAll();
        return array(

                'boot' => $bootCampInfo
            );
    }
}
