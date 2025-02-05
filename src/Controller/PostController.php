<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PostController extends AbstractController{

    #[Route(path:"/post", name:"home")]

    public function home (ManagerRegistry $manager) :Response
    {
        $categories = $manager->getRepository(Category::class)->findAll();

        return $this->render('home/home.html.twig', [
            'categories' => $categories,        
        ]);
    }
}