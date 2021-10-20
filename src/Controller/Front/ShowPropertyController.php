<?php

namespace App\Controller\Front;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowPropertyController extends AbstractController
{
    /**
     * @Route("/show/property/{id}", name="show_property")
     */
    public function index(Property $property, PropertyRepository $propertyRepository): Response
    {

        $properties = $propertyRepository->findAll();

        return $this->render('properties/show_property.html.twig', [
            'property' => $property, 
            'properties' => $properties
        ]);
    }
}
