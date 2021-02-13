<?php

namespace App\Controller;

use App\DidIWinDto;
use App\Entity\Drawing;
use App\Form\DidIWinType;
use App\Repository\DrawingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DidIWinController extends AbstractController
{
    /**
     * @Route("/", name="did_i_win", methods={"GET", "POST"})
     */
    public function didIWin(Request $request, DrawingRepository $drawingRepository): Response
    {
        $didIWin = new DidIWinDto();

        $form = $this->createForm(DidIWinType::class, $didIWin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $drawing = $drawingRepository->findDidIWin($didIWin);

            if (null === $drawing) {
                return $this->redirectToRoute('you_never_won');
            }

            return $this->redirectToRoute('you_won', [
                'id' => $drawing->getId(),
            ]);
        }

        return $this->render('did_i_win.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/you-won", name="you_won", methods={"GET"})
     */
    public function youWon(Drawing $drawing): Response
    {
        return $this->render('you_won.html.twig', [
            'drawing' => $drawing,
        ]);
    }

    /**
     * @Route("/you-never-won", name="you_never_won", methods={"GET"})
     */
    public function youNeverWon(): Response
    {
        return $this->render('you_never_won.html.twig');
    }
}
