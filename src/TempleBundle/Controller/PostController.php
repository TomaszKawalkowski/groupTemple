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

class PostController extends Controller
{
    /**
     * @Route("/inputPost/{technologyid}/{userid}", name = "inputPost")
     * @Template()
     */
    public function inputPostAction(Request $request, $technologyid, $userid)
    {

        $date = new \DateTime();

        $auth_checker = $this->get('security.authorization_checker');
        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        $isRoleAdmin = $auth_checker->isGranted('ROLE_ADMIN');
        $request = Request::createFromGlobals();

        if (!$isRoleAdmin) {
            $em = $this->getDoctrine()->getManager();

            $id = $user->getId();
            $newpost = new postStudents();

            $newpost->setDatetime($date);
            $newpost->setContent($request->request->get('content'));
            $newpost->setUserid($id);
            $newpost->setTechnologyid($technologyid);
            $em->persist($newpost);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array(
                'id' => $technologyid)));

        } else {
            $em = $this->getDoctrine()->getManager();
            $id = $user->getId();

            $newpost = new postsLecturers();

            $newpost->setDatetime($date);
            $newpost->setContent($request->request->get('content'));
            $newpost->setUserid($id);
            $newpost->setTechnologyid($technologyid);
            $em->persist($newpost);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array(
                'id' => $technologyid)));
        }
    }

    /**
     * @Route("/deletePost/{postid}/{student}/{technologyid}", name = "deletePost")
     * @Template()
     */
    public function deletePostAction(Request $request, $postid, $student, $technologyid)
    {


        if ($student == '0') {
            $deletedPost = $this->get('doctrine')->getRepository('TempleBundle:postsLecturers')->findByid($postid);
            $em = $this->getDoctrine()->getManager();
            $em->remove($deletedPost[0]);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array('technologyid' => $technologyid,
                'id' => $technologyid)));
        }
        elseif ($student == '1') {
            $deletedPost = $this->get('doctrine')->getRepository('TempleBundle:postStudents')->findByid($postid);
            $em = $this->getDoctrine()->getManager();
            $em->remove($deletedPost[0]);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array('technologyid' => $technologyid,
                'id' => $technologyid)));
        }

    }

    /**
     * @Route("/editPost/{postid}/{student}/{technologyid}", name= "editPost")
     * @Template()
     */
    public function editPostAction(Request $request, $postid, $student, $technologyid)
    {
        $date = new \DateTime();

        if ($student == '0') {
            $editedPost = $this->get('doctrine')->getRepository('TempleBundle:postsLecturers')->findByid($postid);
            $em = $this->getDoctrine()->getManager();
            $editedPost[0]->setContent($request->request->get('content'));
            $editedPost[0]->setEditdatetime($date);
            $em->persist($editedPost[0]);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array('technologyid' => $technologyid,
                'id' => $technologyid)));
        }
        elseif ($student == '1') {
            $editedPost = $this->get('doctrine')->getRepository('TempleBundle:postStudents')->findByid($postid);
            $em = $this->getDoctrine()->getManager();
            $editedPost[0]->setContent($request->request->get('content'));
            $editedPost[0]->setEditdatetime($date);
            $em->persist($editedPost[0]);
            $em->flush();
            return $this->redirect($this->generateUrl('technologyPage', array('technologyid' => $technologyid,
                'id' => $technologyid)));
        }

    }
}
