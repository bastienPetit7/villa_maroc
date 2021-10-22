<?php

namespace App\Controller\Admin\Booking;

use App\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteBookingController extends AbstractController
{
    /**
     * @Route("admin/delete/booking/{id}", name="delete_booking", methods={"POST"})
     */
    public function delete(Request $request, Booking $booking): Response
    {
        if($this->isCsrfTokenValid('delete'.$booking->getId(), $request->request->get('_token')))
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('list_booking', [], Response::HTTP_SEE_OTHER );
    }
}
