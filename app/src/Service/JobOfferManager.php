<?php

namespace App\Service;

use App\Repository\JobOfferRepository;

class JobOfferManager
{ 
    private $jobOfferRepository;

    public function __construct(JobOfferRepository $jobOfferRepository) {
    
        $this->jobOfferRepository = $jobOfferRepository;
    }
    
    public function getJobOffersAndCandidacies(int $jobId = null): array
    {
        $results = $this->jobOfferRepository->findJobOffersAndCandidacies($jobId);
        return $results;        
    }    
}

?>