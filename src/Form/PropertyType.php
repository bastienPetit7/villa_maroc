<?php

namespace App\Form;

use App\Entity\Property;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Nom de votre propriété', 
                'attr' => [
                    'placeholder' => 'ex: Villa de rêve...'
                ]
            ] )
            ->add('description', CKEditorType::class, [
                'label' => 'Déscription de votre propriété', 
                
            ])
            ->add('shortDescription', CKEditorType::class, [
                'label' => 'Petite déscription de votre propriété', 
                'attr' => [
                    'placeholder' => 'ex: Villa de rêve au pied du plus beau golf de Marrakech...'
                ]
            ])
            ->add('mainPicture', FileType::class, [
                'label' => 'Ajouter l\'image principale de la propriété',
                'mapped' => false
            ])
            ->add('surface', IntegerType::class, [
                'label' => 'Surface en m2'
            ])
            ->add('rooms', IntegerType::class, [
                'label' => 'Nombre de piéces'
            ])
            ->add('bedrooms', IntegerType::class, [
                'label' => 'Nombre de chambre'
            ])
            ->add('bathrooms', IntegerType::class, [
                'label' => 'Nombre de salles de bains'
            ])
            ->add('price', MoneyType::class, [
                'currency'=>"EUR",
                "divisor"=> 100,
                'label' => "Prix pour la location de la propriété pour une semaine", 
                
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville de la propriété', 
                'data' => 'Marrakech'
            ])
            ->add('address', CKEditorType::class, [
                'label' => 'Adresse de la propriété'
            ])
            ->add('guests', IntegerType::class, [
                'label' => 'Nombre de voyageurs'
            ])
            ->add('type', ChoiceType::class, [
                'choices' => $this->getChoices()
            ])
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }

    private function getChoices()
    {
        $choices = Property::TYPE; 
        $output = []; 
        foreach($choices as $k => $v){
            $output[$v] = $k; 
        }  
        return $output;
    }
}
