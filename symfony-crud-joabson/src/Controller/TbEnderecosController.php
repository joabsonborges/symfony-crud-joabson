<?php

namespace App\Controller;

use App\Entity\TbEnderecos;
use App\Form\TbEnderecosType;
use App\Repository\TbEnderecosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tb/enderecos")
 */
class TbEnderecosController extends AbstractController
{
    /**
     * @Route("/", name="tb_enderecos_index", methods={"GET"})
     */
    public function index(TbEnderecosRepository $tbEnderecosRepository): Response
    {
        return $this->render('tb_enderecos/index.html.twig', [
            'tb_enderecos' => $tbEnderecosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tb_enderecos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tbEnderecos = new TbEnderecos();
        $form = $this->createForm(TbEnderecosType::class, $tbEnderecos);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbEnderecos);
            $entityManager->flush();

            return $this->redirectToRoute('tb_enderecos_index');
        }

        return $this->render('tb_enderecos/new.html.twig', [
            'tb_endereco' => $tbEnderecos,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{cod_endereco}", name="tb_enderecos_show", methods={"GET"})
     */
    public function show(TbEnderecos $tbEnderecos): Response
    {
        return $this->render('tb_enderecos/show.html.twig', [
            'tb_endereco' => $tbEnderecos,
        ]);
    }

    /**
     * @Route("/{cod_endereco}/edit", name="tb_enderecos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TbEnderecos $tbEnderecos): Response
    {
        $form = $this->createForm(TbEnderecosType::class, $tbEnderecos);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tb_enderecos_index', [
                'cod_endereco' => $tbEnderecos->getCodEnderecos(),
            ]);
        }

        return $this->render('tb_enderecos/edit.html.twig', [
            'tb_endereco' => $tbEnderecos,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{cod_endereco}", name="tb_enderecos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TbEnderecos $tbEnderecos): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbEnderecos->getCodEnderecos(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbEnderecos);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tb_enderecos_index');
    }
}
