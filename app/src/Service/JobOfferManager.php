<?php

namespace App\Service;

use App\Repository\JobOfferRepository;

class JobOfferManager
{ 

    private $jobOfferRepository;

    public function __construct(JobOfferRepository $jobOfferRepository) {
    
        $this->jobOfferRepository = $jobOfferRepository;
    }
    
    public function getJobOffersAndCandicacies(): array
    {

        $results = $this->jobOfferRepository->findJobOffersAndCandicacies();
        return $results;        
    }    
}

?>