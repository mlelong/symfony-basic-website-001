<?php

namespace App\Repository;

use App\Entity\JobOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobOffer[]    findAll()
 * @method JobOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobOffer::class);
    }
    
    public function findJobOffersAndCandicacies() {
        
        $qb = $this->createQueryBuilder('joboffer')
            ->leftjoin('joboffer.candidacies', 'candidacy')
            ->leftjoin('candidacy.candidate', 'candidate')
            ->orderBy('joboffer.id', 'DESC')
            ->setMaxResults(10)
            ;
            
        return $qb
                    ->getQuery()
                    ->getResult()
                    ;
    }    
    
}
