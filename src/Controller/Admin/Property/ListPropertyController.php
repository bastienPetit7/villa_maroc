<?php

namespace App\Controller\Admin\Property;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ListPropertyController extends AbstractController
{
    /**
     * @Route("/admin/property/list", name="admin_property_index", methods={"GET"})
     */
    public function index(PropertyRepository $propertyRepository): Response
    {
        return $this->render('admin/admin_property/list.html.twig', [
            'properties' => $propertyRepository->findAll(),
        ]);
    }
}