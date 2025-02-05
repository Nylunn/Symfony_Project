<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function home(ManagerRegistry $manager): Response
 {
        //Charge l'objectmanager
        $om = $manager->getManager();
        // on lance une boucle pour créer 10 catégories
        for ($i=1; $i < 11; $i++) {
        //On instancie l'entité Category
        $category = new Category();
        //On utilise les setter pour ajouter des données
        $category->setName("Catégories n' $i");

        $om->persist($category);
        
        $om->flush();
        //On récupère la valeur de name grace au getter
        dump($category->getName());
        return $this->render('user/index.html.twig');
    }
}};
