<?php

namespace App\Controller;

use App\Entity\Zapatilla;
use App\Form\ZapatillaType;
use App\Repository\ZapatillaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zapatilla")
 */
class ZapatillaController extends AbstractController
{
    /**
     * @Route("/", name="zapatilla_index", methods={"GET"})
     */
    public function index(ZapatillaRepository $zapatillaRepository): Response
    {
        return $this->render('zapatilla/index.html.twig', [
            'zapatillas' => $zapatillaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="zapatilla_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zapatilla = new Zapatilla();
        $form = $this->createForm(ZapatillaType::class, $zapatilla);
        $form->handleRequest($request);
        $id = $zapatilla->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zapatilla);
            $entityManager->flush();

            return $this->redirectToRoute('zapatilla_index');
        }

        return $this->render('zapatilla/new.html.twig', [
            'zapatilla' => $zapatilla,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zapatilla_show", methods={"GET"})
     */
    public function show(Zapatilla $zapatilla): Response
    {
        $em = $this->getDoctrine()->getManager();
        
        $zapatilla = $em->getRepository(Zapatilla::class)->findOneBy([ 'id' => $zapatilla->getId()  ]);
      
        return $this->render('zapatilla/show.html.twig', [
            'zapatilla' => $zapatilla,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="zapatilla_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Zapatilla $zapatilla): Response
    {
        $form = $this->createForm(ZapatillaType::class, $zapatilla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zapatilla_index');
        }

        return $this->render('zapatilla/edit.html.twig', [
            'zapatilla' => $zapatilla,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zapatilla_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Zapatilla $zapatilla): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zapatilla->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zapatilla);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zapatilla_index');
    }
}
