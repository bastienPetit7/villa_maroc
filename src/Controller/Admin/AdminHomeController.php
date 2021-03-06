<?php

namespace App\Controller\Admin;

use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AbstractController
{
    /**
     * @Route("/admin/home", name="admin_home")
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

        return $this->render('admin/admin_home/index.html.twig', compact('data'));
    }
}
