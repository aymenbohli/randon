<?php

namespace App\Controller;

use App\Entity\Produc;
use App\Form\ProducType;
use App\Repository\ProducRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produc")
 */
class ProducController extends AbstractController
{
    /**
     * @Route("/", name="produc_index", methods={"GET"})
     */
    public function index(ProducRepository $producRepository): Response
    {
        return $this->render('produc/index.html.twig', [
            'producs' => $producRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produc_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produc = new Produc();
        $form = $this->createForm(ProducType::class, $produc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produc);
            $entityManager->flush();

            return $this->redirectToRoute('produc_index');
        }

        return $this->render('produc/new.html.twig', [
            'produc' => $produc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produc_show", methods={"GET"})
     */
    public function show(Produc $produc): Response
    {
        return $this->render('produc/show.html.twig', [
            'produc' => $produc,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produc_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produc $produc): Response
    {
        $form = $this->createForm(ProducType::class, $produc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produc_index');
        }

        return $this->render('produc/edit.html.twig', [
            'produc' => $produc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produc_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produc $produc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produc->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produc_index');
    }
}
