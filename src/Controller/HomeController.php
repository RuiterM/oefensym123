<?php

namespace App\Controller;

use App\Entity\Autos;
use App\Form\InsertType;
use App\Repository\AutosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route('/', name: "home")]
    public function home(ManagerRegistry $doctrine): Response
    {
        $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->render('home/index.html.twig',['autos'=>$autos]);
    }

    #[Route('/details/{id}', name: "details")]
    public function details(ManagerRegistry $doctrine, int $id): Response
    {
        $auto=$doctrine->getRepository(Autos::class)->find($id);
        return $this->render('home/details.html.twig',['auto'=>$auto]);
    }

    #[Route('/update/{id}', name: "update")]
    public function update(Request $request,EntityManagerInterface $entityManager, int $id): Response
    {
        $auto=$entityManager->getRepository(Autos::class)->find($id);

        $form=$this->createForm(InsertType::class,$auto);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $auto=$form->getData();
            $entityManager->persist($auto);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->renderForm('home/update.html.twig', [
            'UpdateForm'=>$form
        ]);
    }

    #[Route('/delete/{id}', name: "delete")]
    public function delete(Request $request,EntityManagerInterface $entityManager, int $id): Response
    {
        $auto=$entityManager->getRepository(Autos::class)->find($id);

            $entityManager->remove($auto);
            $entityManager->flush();
            return $this->redirectToRoute('home');
    }

    #[Route('/login', name: "login")]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('home/login.html.twig',
        [
            'error' => $error
        ]);
    }

    #[Route('/logout', name: "logout")]
    public function logout(AuthenticationUtils $authenticationUtils): Response
    {
      throw new \Exception('error');
    }

    #[Route('/insert', name: "insert")]
    public function insert(AutosRepository $autosRepository, Request $request): Response
    {
        $auto=new Autos();
        $form=$this->createForm(InsertType::class,$auto);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $auto=$form->getData();


            $autosRepository->save($auto);

            return $this->redirectToRoute('home');

        }

       // $autos=$doctrine->getRepository(Autos::class)->findAll();
        return $this->renderForm('home/insert.html.twig',['form'=>$form]);
    }
}
