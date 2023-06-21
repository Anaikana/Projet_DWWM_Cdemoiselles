<?php

namespace App\Controller;

use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;
use App\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Translation\MessageCatalogue;


class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Articles::class)->findAll();
        return $this->render('blog/index.html.twig', ['articles' => $articles]);
    }

    #[Route('/aPropos', name: 'app_aPropos')]
    public function aPropos(): Response
    {
        return $this->render('blog/aPropos.html.twig', [
            'controller_name' => 'À propos',
        ]);
    }
    
    #[Route('/prestations', name: 'app_prestations')]
    public function prestations(): Response
    {
        return $this->render('blog/prestations.html.twig', [
            'controller_name' => 'Les prestations',
        ]);
    }

    #[Route('/ateliers', name: 'app_ateliers')]
    public function ateliers(): Response
    {
        return $this->render('blog/ateliers.html.twig', [
            'controller_name' => 'Les ateliers',
        ]);
    }

    #[Route('/rdv', name: 'app_rdv')]
    public function rdv(): Response
    {
        return $this->render('blog/rdv.html.twig', [
            'controller_name' => 'Rendez-vous',
        ]);
    }

      
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $Message = new Message();
        $contactForm = $this->createForm(MessageType::class, $Message);
        return $this->render('blog/contact.html.twig', ['contactform'=>$contactForm
        ]);
    }

    
   

}
