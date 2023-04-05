<?php

namespace App\Controller;

use App\Entity\Autos;
use App\Form\InsertType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: "home")]
    public function home(ManagerRegistry $doctrine): Response
    {
        $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->render('home/index.html.twig',['autos'=>$autos]);
    }

    #[Route('/details', name: "details")]
    public function details(ManagerRegistry $doctrine): Response
    {
        $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->render('home/details.html.twig',['autos'=>$autos]);
    }

    #[Route('/update', name: "update")]
    public function update(ManagerRegistry $doctrine): Response
    {
        $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->render('home/update.html.twig',['autos'=>$autos]);
    }

    #[Route('/delete', name: "delete")]
    public function delete(ManagerRegistry $doctrine): Response
    {
        $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->render('home/delete.html.twig',['autos'=>$autos]);
    }

    #[Route('/insert', name: "insert")]
    public function insert(ManagerRegistry $doctrine): Response
    {
        $auto=new Autos();
        $form=$this->createForm(InsertType::class,$auto);

       // $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->renderForm('home/insert.html.twig',['form'=>$form]);
    }
}
