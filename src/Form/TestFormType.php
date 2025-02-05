<?php

namespace App\Form;

use App\Entity\Category;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
