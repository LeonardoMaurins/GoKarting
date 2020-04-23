<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Staff;
use App\Entity\Race;
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

//    /**
//     * @Route("/people", name="people")
//     */
//    public function people() {
//
//        $users = $this->getDoctrine()->getRepository
//        (User::class)->findAll();
//
//        $roles = [];
//
//        foreach($users as $user){
//            if(!in_array($user->getRole(), $roles)) {
//                $roles[] = $user->getRole();
//            }
//        }
//
//        return $this->render('people/index.html.twig', ['users' => $users, 'roles' => $roles]);
//    }
//
//    /**
//     * @Route("/{id}", name="user_show", methods={"GET"})
//     */
//    public function show(User $user): Response
//    {
//        return $this->render('user/show.html.twig', [
//            'user' => $user,
//        ]);
//    }

    /**
     * @Route("/race", name="race")
     */
    public function race() {

        $races = $this->getDoctrine()->getRepository
        (Race::class)->findAll();

        $tracks = [];

        foreach($races as $race){
            if(!in_array($race->getTrack(), $tracks)) {
                $tracks[] = $race->getTrack();
            }
        }

        return $this->render('race/index.html.twig', ['races' => $races, 'tracks' => $tracks]);
    }
}