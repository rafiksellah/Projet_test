<?php

namespace App\Controller;

use App\Entity\OffreDemploi;
use App\Repository\OffreDemploiRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(OffreDemploiRepository $offreDemploiRepository): Response
    {
        $offre_emplois = $offreDemploiRepository->findBy(['statut'=>1]);
        return $this->render('home/index.html.twig', [
            'offre_emplois' => $offre_emplois,
        ]);
    }

    /**
     * @Route("/detail_offre/{id}", name="app_detail_offre", methods={"GET"})
     */
    public function detailOffre(OffreDemploi $offre_emploi): Response
    {
        return $this->render('home/detail_offre.html.twig', [
            'offre_emploi' => $offre_emploi,
        ]);
    }
}
