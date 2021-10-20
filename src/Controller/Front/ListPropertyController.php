<?php

namespace App\Controller\Front;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListPropertyController extends AbstractController
{
    /**
     * @Route("/list/property", name="list_property" )
     */
    public function index(PropertyRepository $propertyRepository): Response
    {
        $properties = $propertyRepository->findAll(); 

        return $this->render('properties/list_properties.html.twig', [
            'properties' => $properties
        ]);
    }
}
