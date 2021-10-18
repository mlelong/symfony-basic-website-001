<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\JobOffer;
use App\Service\JobOfferManager;

class JobOfferController extends AbstractController
{

    /**
    * @Route("/joboffers/display")
    */
    public function display(JobOfferManager $jobOfferManager): Response
    { 
        $jobOffers = $jobOfferManager->getJobOffersAndCandicacies();

        return $this->render('JobOffers/display.html.twig', [
            'jobOffers' => $jobOffers,
            
        ]);
    }
}