<?php

namespace App\Controller;

use App\Entity\Race;
use App\Form\RaceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RaceController extends AbstractController
{
    /**
     * @Route("/race", name="race_index")
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

    /**
     * @Route("/new", name="new_race", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $race = new Race();
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($race);
            $entityManager->flush();

            return $this->redirectToRoute('race_index');
        }

        return $this->render('race/new.html.twig', [
            'user' => $race,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show_race", methods="GET")
     */
    public function show(Race $race): Response
    {
        return $this->render('race/show.html.twig', [
            'race' => $race,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit_race", methods={"GET","POST"})
     */
    public function edit(Request $request, Race $race): Response
    {
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('race_index');
        }

        return $this->render('race/edit.html.twig', [
            'race' => $race,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete_race", methods={"DELETE", "POST"})
     */
    public function delete(Request $request, Race $race): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($race);
        $entityManager->flush();

        return $this->redirectToRoute('race_index');
    }
}
