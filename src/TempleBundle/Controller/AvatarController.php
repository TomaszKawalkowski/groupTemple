<?php

namespace TempleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AvatarController extends Controller
{
    /**
     * @Route("/showAvatar")
     * @Template()
     */
    public function showAvatarAction()
    {

        $userArrow = $this->get('doctrine')->getRepository('AppBundle:User')->findAll();
        return
            array(

                'userArrow' => $userArrow

            );

    }
}
