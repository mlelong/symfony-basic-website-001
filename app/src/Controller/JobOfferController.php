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
    * @Route("/joboffers/display/{jobId}")
    */
    public function display(JobOfferManager $jobOfferManager, int $jobId = null): Response
    {

        $jobOffers = $jobOfferManager->getJobOffersAndCandidacies($jobId);

        return $this->render('JobOffers/display.html.twig', [
            'jobOffers' => $jobOffers,
            
        ]);
    }
}