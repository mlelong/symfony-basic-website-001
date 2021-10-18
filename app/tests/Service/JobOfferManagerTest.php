<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\JobOfferManager;
use App\Entity\JobOffer;

class JobOfferManagerTest extends KernelTestCase
{
    public function testGetJobOffersAndCandidacies(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        
        $jobOfferManager = self::$container->get(JobOfferManager::class);
        $results = $jobOfferManager->getJobOffersAndCandidacies();
        
        $this->assertEquals(3, count($results));        
        $this->assertInstanceOf(JobOffer::class, $results[0]);
    }
}
