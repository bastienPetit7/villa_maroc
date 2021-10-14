<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/property")
 */
class ShowPropertyController extends AbstractController
{
    /**
     * @Route("/{id}", name="admin_property_show", methods={"GET"})
     */
    public function show(Property $property): Response
    {
        return $this->render('admin/admin_property/show.html.twig', [
            'property' => $property,
        ]);
    }
}