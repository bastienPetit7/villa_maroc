<?php

namespace App\Controller\Admin\Booking;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditBookingController extends AbstractController
{
    /**
     * @Route("/edit/booking/{id}", name="edit_booking")
     */
    public function edit(Booking $booking, Request $request, EntityManagerInterface $em): Response
    {

        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {


            $em->flush();
            $this->addFlash('success', 'La réservation a bien été modifiée');
            return $this->redirectToRoute('list_booking', [], Response::HTTP_SEE_OTHER);
        }



        return $this->render('admin/booking/edit.html.twig', [
            'form' => $form->createView(), 
            'booking' => $booking
        ]);
    }
}
