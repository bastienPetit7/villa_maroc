<?php

namespace App\Controller\Admin\Property;

use App\Entity\Image;
use App\Entity\Property;
use App\Form\PropertyType;
use App\MesServices\ImageService;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EditPropertyController extends AbstractController
{
   /**
     * @Route("/admin/property/edit/{id}", name="admin_property_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Property $property, ImageService $imageService): Response
    {
        $ancienneMainPicture = $property->getMainPicture();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mainPicture = $form->get('mainPicture')->getData();
            if(isset($mainPicture))
            {
                $imageService->sauvegarderMainPicture($property,$mainPicture);
                $imageService->supprimerImage($ancienneMainPicture);
            }


            $images = $form->get('images')->getData(); 
            
           

            foreach( $images as $image)
            {
                $imageEntity = new Image(); 
                $imageService->sauvegarderImage($imageEntity, $property, $image);
            }

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La propiétée a bien été modifiée');

            return $this->redirectToRoute('admin_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_property/edit.html.twig', [
            'property' => $property,
            'form' => $form,
        ]);
    }
}