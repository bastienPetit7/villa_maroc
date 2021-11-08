<?php

namespace App\Controller\Admin\Property;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ShowPropertyController extends AbstractController
{
    /**
     * @Route("/admin/property/show/{id}", name="admin_property_show", methods={"GET"})
     */
    public function show(Property $property): Response
    {
        $events = $property->getBookings()->getValues(); 

        $reservations = []; 

        foreach($events as $event)
        {
            $reservations[] = [
                'id' => $event->getId(), 
                'title' => $event->getTitle(),
                'start' => $event->getStart()->format('Y-m-d'), 
                'end' => $event->getEnd()->format('Y-m-d')."T12:00:00", 
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'textColor' => $event->getTextColor(),
                // 'display' => 'background'

            ];
        }

        $data = json_encode($reservations);

        

        return $this->render('admin/admin_property/show.html.twig', [
            'data' => $data,
            'property' => $property,
        ]);
    }
}