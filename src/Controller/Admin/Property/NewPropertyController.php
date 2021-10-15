<?php

namespace App\Controller\Admin\Property;

use App\Entity\Property;
use App\Form\PropertyType;
use App\MesServices\ImageService;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class NewPropertyController extends AbstractController
{
   /**
     * @Route("/admin/property/create", name="admin_property_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageService $imageService): Response
    {
       

        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('mainPicture')->getData();

            $imageService->sauvegarderImage($property,$file);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($property);
            $entityManager->flush();

            return $this->redirectToRoute('admin_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_property/new.html.twig', [
            'property' => $property,
            'form' => $form,
        ]);
    }
}