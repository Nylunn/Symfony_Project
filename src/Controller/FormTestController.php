<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CategoryType;

final class FormTestController extends AbstractController
{
    #[Route('/category/save', name: 'add_category', methods: ['GET', 'POST'])]
    public function save(Request $request, ManagerRegistry $manager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $om = $manager->getManager();
            $om->persist($category);
            $om->flush();

            return $this->redirectToRoute("home");
        }

        return $this->render('form_test/index.html.twig', [
            'categoryForm' => $form->createView()
        ]);
    }
}