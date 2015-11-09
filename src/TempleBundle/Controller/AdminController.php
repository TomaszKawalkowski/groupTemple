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
use TempleBundle\Entity\TechnologyLecturers;
use TempleBundle\Entity\Bootcamp_name;

class AdminController extends Controller
{
    /**
     * @Route("course_management")
     * @Template()
     */
    public function adminAction()
    {
        $userArrow = $this->get('doctrine')->getRepository('AppBundle:User')->findAll();
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        return array(
            'userArrow' => $userArrow,
            'technologyArrow' => $technologyArrow
        );
    }

    /**
     * @Route("editBootcamp", name="editBootcamp"))
     * @Template()
     */
    public function editBootcampAction(Request $request)
    {
        $userArrow = $this->get('doctrine')->getRepository('AppBundle:User')->findAll();
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();
        $bootCampInfo = $this->get('doctrine')->getRepository('TempleBundle:Bootcamp_name')->findAll();

        $newBootcamp = new Bootcamp_name();

        $form = $this->createFormBuilder($newBootcamp)
            ->add('name', "text")
            ->add('startDate', "datetime")
            ->add('endDate', "datetime")
            ->add('mainLecturer', "text")
            ->add('save', 'submit', array('label' => "edit BootCamp Info"))
            ->getForm();

        $form->handleRequest($request);

        return array(
            'userArrow' => $userArrow,
            'technologyArrow' => $technologyArrow,
            'boot' => $bootCampInfo,
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("updateBootcamp", name="updateBootcamp"))
     * @Template()
     */
    public function updateBootcampAction(Request $request)
    {
        $userArrow = $this->get('doctrine')->getRepository('AppBundle:User')->findAll();
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();
        $newBootcamp = $this->get('doctrine')->getRepository('TempleBundle:Bootcamp_name')->find('1');


        $form = $this->createFormBuilder($newBootcamp)
            ->add('name', "text")
            ->add('startDate', "datetime")
            ->add('endDate', "datetime")
            ->add('mainLecturer', "text")
            ->add('save', 'submit', array('label' => "edit BootCamp Info"))
            ->getForm();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $validator = $this->get('validator');
        $errors = $validator->validate($newBootcamp);

        if (!$form->isValid()) {
            $errorString = (string)$errors;
            return $this->render('TempleBundle:Main:editBootcamp.html.twig', array('errors' => $errors, "form" => $form->createView()));
        }

        $em->flush();
        return $this->redirectToRoute("main", array("errorArray => $errors"));

    }

//    }
}
