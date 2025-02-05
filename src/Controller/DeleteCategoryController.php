<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteCategoryController extends AbstractController
{
    #[Route('/category/{id}/delete', name: 'delete_category', requirements:['id' => "\d+"], methods:['GET'])]
    public function delete(int $id, ManagerRegistry $manager): Response
    {
        $category = $manager->getRepository(Category::class)->find($id);
        
        if ($category) {
            $om = $manager->getManager();
            // Remove permet de supprimer un élèments en BDD
            $om->remove($category);
            $om->flush();
        }
        return $this->redirectToRoute('home');
    }
}
