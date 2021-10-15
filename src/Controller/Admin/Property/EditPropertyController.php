<?php

namespace App\Controller\Admin\Property;

use App\Entity\Property;
use App\Form\PropertyType;
use App\MesServices\ImageService;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EditPropertyController extends AbstractController
{
   /**
     * @Route("/admin/property/edit/{id}", name="admin_property_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Property $property, ImageService $imageService): Response
    {
        $ancienneImage = $property->getMainPicture();

        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('mainPicture')->getData();
            
            $imageService->sauvegarderImage($property,$file);

            $imageService->supprimerImage($ancienneImage);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_property/edit.html.twig', [
            'property' => $property,
            'form' => $form,
        ]);
    }
}