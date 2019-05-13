<?php

namespace App\Controller;

use App\Entity\TbContatos;
use App\Form\TbContatosType;
use App\Repository\TbContatosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tb/contatos ")
 */
class TbContatosController extends AbstractController
{
    /**
     * @Route("/", name="tb_contatos _index", methods={"GET"})
     */
    public function index(TbContatosRepository $tbContatosRepository): Response
    {
        return $this->render('tb_contatos /index.html.twig', [
            'tb_contatos ' => $tbContatosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tb_contatos _new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tbTecnico = new TbContatos();
        $form = $this->createForm(TbContatosType::class, $tbTecnico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbTecnico);
            $entityManager->flush();

            return $this->redirectToRoute('tb_contatos _index');
        }

        return $this->render('tb_contatos /new.html.twig', [
            'tb_contato' => $tbTecnico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tb_contatos _show", methods={"GET"})
     */
    public function show(TbContatos $tbTecnico): Response
    {
        return $this->render('tb_contatos /show.html.twig', [
            'tb_contato' => $tbTecnico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tb_contatos _edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TbContatos $tbTecnico): Response
    {
        $form = $this->createForm(TbContatosType::class, $tbTecnico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tb_contatos _index', [
                'id' => $tbTecnico->getId(),
            ]);
        }

        return $this->render('tb_contatos /edit.html.twig', [
            'tb_contato' => $tbTecnico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tb_contatos _delete", methods={"DELETE"})
     */
    public function delete(Request $request, TbContatos $tbTecnico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbTecnico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbTecnico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tb_contatos _index');
    }
}
