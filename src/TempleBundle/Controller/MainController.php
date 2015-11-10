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


class MainController extends Controller
{
    /**
     * @Route("/", name = "main")
     * @Template()
     */
    public function mainAction()
    {
        $bootCampInfo = $this->get('doctrine')->getRepository('TempleBundle:Bootcamp_name')->findAll();
        $userArrow = $this->get('doctrine')->getRepository('AppBundle:User')->findAll();
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        $PostsLecturers = $this->getDoctrine()->getRepository('TempleBundle:postsLecturers')->findAll();
        $PostsStudents = $this->getDoctrine()->getRepository('TempleBundle:postStudents')->findAll();

        $quantityTechnology = count($technologyArrow);
        $n = 0;
        $technologyIdArrow = [];
        for ($i = 0; $i < $quantityTechnology; $i++){
            $n = $technologyArrow[$i]->getId();
            $technologyIdArrow[$i] = $n;
        }

        $quantityPostStudents = [];


        for ($i = 0; $i < $quantityTechnology; $i++){
            $k = 0;
            for ($p = 0; $p < count($PostsStudents); $p++){

            if ($PostsStudents[$p]->getTechnologyid() == $technologyIdArrow[$i])
                $k = $k + 1;
                $quantityPostStudents[$i]= $k;
            }
        }

        $quantityPostLecturers = [];


        for ($i = 0; $i < $quantityTechnology; $i++){
            $k = 0;
            for ($p = 0; $p < count($PostsLecturers); $p++){

            if ($PostsLecturers[$p]->getTechnologyid() == $technologyIdArrow[$i])
                $k = $k + 1;
                $quantityPostLecturers[$i]= $k;
            }
        }


        return
            array(
                'boot' => $bootCampInfo,
                'userArrow' => $userArrow,
                'technologyArrow' => $technologyArrow,
                'PostsLecturers' => $PostsLecturers,
                'PostsStudents' =>  $PostsStudents,
                'technologyIdArrow' =>  $technologyIdArrow,
                'quantityPostStudents' =>  $quantityPostStudents,
                'quantityPostLecturers' =>  $quantityPostLecturers
            );
    }

    /**
     *
     * @Template()
     */
    public function BootcampInfoAction()
    {

        return array();
    }

    /**
     * @Route("/chat")
     * @Template()
     */
    public function chatAction()
    {
        return array(// ...
        );
    }

    /**
     * @Route("/sendEmail")
     * @Template()
     */
    public function sendEmailAction()
    {
        return array(// ...
        );
    }

    /**
     * @Route("/addTechnology", name="addTechnology")
     * @Template()
     */
    public function addTechnologyAction(Request $request)
    {
        $newTechnology = new Technology();
        $form = $this->createFormBuilder($newTechnology)
            ->add('name', "text")
            ->add('description', "textarea")
            ->add('Lecturer_Id', "integer")
            ->add('save', 'submit', array('label' => "Add Technology"))
            ->getForm();

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $validator = $this->get('validator');
        $errors = $validator->validate($newTechnology);
        if (!$form->isValid()) {
            $errorString = (string)$errors;
            return $this->render('TempleBundle:Main:createTechnology.html.twig', array('errors' => $errors, "form" => $form->createView()));
        }
        $em->persist($newTechnology);
        $em->flush();
        return $this->redirectToRoute("createTechnology", array("errorArray => $errors"));
    }

    /**
     * @Route("/createTechnology", name ="createTechnology")
     * @Template()
     */
    public function createTechnologyAction(Request $request)
    {
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        $newTechnology = new Technology();
        $form = $this->createFormBuilder($newTechnology)
            ->add('name', "text")
            ->add('description', "textarea")
            ->add('Lecturer_Id', "integer")
            ->add('save', 'submit', array('label' => "Add Technology"))
            ->getForm();

        $form->handleRequest($request);

        return array(
            'form' => $form->createView(),
            'technologyArrow' => $technologyArrow
        );
    }

    /**
     * @Route("/test")
     * @Template()
     * @return array
     */
    public function testAction()
    {
        return array('value' => date('Y-m-d H:i:s'));
    }

    /**
     * @Route("/infodeleteTechnology", name ="infodeleteTechnology")
     * @Template()
     */
    public function infodeleteTechnologyAction(Request $request)
    {

        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        $formone = $this->createFormBuilder($technologyArrow)
            ->add('id', "entity", array(
                'class' => 'TempleBundle:Technology',
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'name'))
            ->add('save', 'submit', array('label' => "delete technology"))
            ->getForm();

        $formone->handleRequest($request);
        return array(
            'form' => $formone->createView(),
            'form2' => $formone->createView(),
        );
    }

    /**
     * @Route("/deleteTechnology", name ="deleteTechnology")
     * @Template()
     */
    public function deleteTechnologyAction(Request $request)
    {
        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();
        $form = $this->createFormBuilder($technologyArrow)
            ->add('id', "entity", array(
                'class' => 'TempleBundle:Technology',
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'name'))
            ->add('save', 'submit', array('label' => "delete technology"))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $id = $form->getData()['id']->getId();
            $repo = $this->getDoctrine()->getRepository("TempleBundle:Technology");
            $technology = $repo->find($id);
            $em = $this->getDoctrine()->getManager();
            $em->remove($technology);
            $em->flush();
            return $this->redirectToRoute("createTechnology");
        }
    }


    /**
     * @Route("/selectTechnology", name ="selectTechnology")
     * @Template()
     */
    public function selectTechnologyAction(Request $request)
    {

        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        $form = $this->createFormBuilder($technologyArrow)
            ->add('id', "entity", array(
                'class' => 'TempleBundle:Technology',
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'name'))
            ->add('name', "text")
            ->add('description', "textarea")
            ->add('Lecturer_Id', "integer")
            ->add('save', 'submit', array('label' => "Send changes"))
            ->getForm();

        $form->handleRequest($request);


        return array(
            'form' => $form->createView(),

        );
    }

    /**
     * @Route("/editTechnology", name ="editTechnology")
     * @Template()
     */
    public function editTechnologyAction(Request $request)
    {

        $technologyArrow = $this->get('doctrine')->getRepository('TempleBundle:Technology')->findAll();

        $form = $this->createFormBuilder($technologyArrow)
            ->add('id', "entity", array(
                'class' => 'TempleBundle:Technology',
                'multiple' => false,
                'expanded' => false,
                'choice_label' => 'name'))
            ->add('name', "text")
            ->add('description', "textarea")
            ->add('Lecturer_Id', "integer")
            ->add('save', 'submit', array('label' => "Send changes"))
            ->getForm();

        $form->handleRequest($request);
        var_dump($form->getData());
        $request = Request::createFromGlobals();
        var_dump($form->getData()['name']);


        if ($form->isValid()) {
            $id = $form->getData()['id']->getId();
            $repo = $this->getDoctrine()->getRepository("TempleBundle:Technology");
            $technology = $repo->find($id);
            $em = $this->getDoctrine()->getManager();

            $technology->setName($form->getData()['name']);
            $technology->setDescription($form->getData()['description']);
            $technology->setLecturerId($form->getData()['Lecturer_Id']);
            $em->flush();
            return $this->redirectToRoute("main");
        }
    }



}
