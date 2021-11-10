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


class DeletePropertyController extends AbstractController
{
    /**
     * @Route("/admin/property/delete/{id}", name="admin_property_delete", methods={"POST"})
     */
    public function delete(Request $request, Property $property , ImageService $imageService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$property->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();

            $imageService->supprimerImage($property->getMainPicture()); 

            $entityManager->remove($property);
            $entityManager->flush();
        }
        $this->addFlash('success', 'La propiétée a bien été supprimée');

        return $this->redirectToRoute('admin_property_index', [], Response::HTTP_SEE_OTHER);
    }
}