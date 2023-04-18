<?php

namespace App\Controller\Admin;

use App\Entity\OffreDemploi;
use App\Form\OffreDemploiType;
use App\Repository\OffreDemploiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/offre_demploi")
 */
class OffreDemploiController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_offre_demploi_index", methods={"GET"})
     */
    public function index(OffreDemploiRepository $offreDemploiRepository): Response
    {
        return $this->render('admin/offre_demploi/index.html.twig', [
            'offre_emplois' => $offreDemploiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_offre_demploi_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OffreDemploiRepository $offreDemploiRepository): Response
    {
        $offreDemploi = new OffreDemploi();
        $form = $this->createForm(OffreDemploiType::class, $offreDemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreDemploiRepository->add($offreDemploi, true);

            return $this->redirectToRoute('app_admin_offre_demploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/offre_demploi/new.html.twig', [
            'offre_demploi' => $offreDemploi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_offre_demploi_show", methods={"GET"})
     */
    public function show(OffreDemploi $offre_emploi): Response
    {
        return $this->render('admin/offre_demploi/show.html.twig', [
            'offre_emploi' => $offre_emploi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_offre_demploi_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OffreDemploi $offreDemploi, OffreDemploiRepository $offreDemploiRepository): Response
    {
        $form = $this->createForm(OffreDemploiType::class, $offreDemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreDemploiRepository->add($offreDemploi, true);

            return $this->redirectToRoute('app_admin_offre_demploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/offre_demploi/edit.html.twig', [
            'offre_demploi' => $offreDemploi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_offre_demploi_delete", methods={"POST"})
     */
    public function delete(Request $request, OffreDemploi $offreDemploi, OffreDemploiRepository $offreDemploiRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreDemploi->getId(), $request->request->get('_token'))) {
            $offreDemploiRepository->remove($offreDemploi, true);
        }

        return $this->redirectToRoute('app_admin_offre_demploi_index', [], Response::HTTP_SEE_OTHER);
    }
}
