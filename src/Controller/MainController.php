<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Staff;
use App\Repository\UserRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home() {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about() {
        return $this->render('main/about.html.twig');
    }
//
//    /**
//     * @Route("/account", name="account")
//     */
//    public function account() {
//
//        $users = $this->getDoctrine()->getRepository
//        (User::class)->findAll();
//
//        $departments = [];
//
//        return $this->render('table/table.html.twig', ['users' => $users]);
//    }
//
//    /**
//     * @Route("/race", name="race")
//     */
//    public function race() {
//
//        $users = $this->getDoctrine()->getRepository
//        (User::class)->findAll();
//
//        $departments = [];
//
//        return $this->render('table/table.html.twig', ['users' => $users]);
//    }
}