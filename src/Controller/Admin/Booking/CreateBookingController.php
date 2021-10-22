<?php

namespace App\Controller\Admin\Booking;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateBookingController extends AbstractController
{
    /**
     * @Route("admin/create/booking", name="create_booking")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $booking = new Booking; 
        $form = $this->createForm(BookingType::class, $booking); 

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $property = $form->get('property')->getData(); 
            
            $booking->setBackgroundColor($property->getBgColorCalendar());

            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('list_booking', [], Response::HTTP_SEE_OTHER);
        }



        return $this->render('admin/booking/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
