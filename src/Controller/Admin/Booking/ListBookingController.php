<?php

namespace App\Controller\Admin\Booking;

use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ListBookingController extends AbstractController
{

    /**
     * @Route("admin/list/bookind", name="list_booking")
     */
    public function index(BookingRepository $bookingRepository): Response
    {
        $events = $bookingRepository->findAll(); 

      

        $reservations = []; 

        foreach($events as $event)
        {
            $reservations[] = [
                'id' => $event->getId(), 
                'title' => $event->getTitle(),
                'start' => $event->getStart()->format('Y-m-d'), 
                'end' => $event->getEnd()->format('Y-m-d'), 
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'textColor' => $event->getTextColor(),
                

            ];
        }

        $data = json_encode($reservations);

        return $this->render('admin/booking/list.html.twig', [
            'bookings' => $bookingRepository->findAllDesc(), 
            'data' => $data
        ]);
    }
}