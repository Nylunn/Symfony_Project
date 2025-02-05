<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(): Response
    {
        $category = new Category;

        $form = $this->createFormBuilder($category)

        ->add('name', TextType::class, [
            'label' => 'Nom de la catégorie',
            'attr' => [
                'class' => 'form-floating',
                'placeholder' => "Nom de la catégorie"
            ]
        ])

         ->add('name', SubmitType::class, [
            'label' => 'Ajouter',
            'attr' => [
                'class' => 'btn btn-primary',
            ]
        ])

        ->getForm();
        return $this->render('form/index.html.twig');
    }
}
