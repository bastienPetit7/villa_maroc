<?php

namespace App\Controller\Admin\Property;

use App\Entity\Image;
use App\MesServices\ImageService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DeletePropertyImageController extends AbstractController
{

    /**
     * @Route("/admin/property/delete/image/{id}", name="admin_property_delete_image", methods={"DELETE"})
     */
    public function deleteImage(Image $image, Request $request, ImageService $imageService)
    {   

        $data = json_decode($request->getContent(), true); 

        if($this->isCsrfTokenValid('delete' .$image->getId(), $data['_token']))
        {
            $imageService->supprimerImage($image->getTitle());

            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($image);
            $entityManager->flush();

            return new JsonResponse(['success' => 1]);

        }else
        {
            return new JsonResponse(['error' => 'Token invalid'], 400); 
        }

    }
}