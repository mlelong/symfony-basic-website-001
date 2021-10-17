<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Candidate;
use App\Entity\JobOffer;
use App\Entity\Candidacy;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $candidate1 = new Candidate();
        $candidate1->setName('Simon')
                   ->setFirstname('Julian')
                   ;
        $manager->persist($candidate1);

        $candidate2 = new Candidate();
        $candidate2->setName('Houssin')
                   ->setFirstname('Laurent')
                   ;
        $manager->persist($candidate2);

        $candidate3 = new Candidate();
        $candidate3->setName('Flex')
                   ->setFirstname('James')
                   ;
        $manager->persist($candidate3);

        $job1 = new JobOffer('');
        $job1->setTitle('CTO F/H')
             ->setDescription('Rejoignez une startup à impact qui vise à favoriser l’égalité des chances en permettant à tous les lycéens et étudiants de choisir leur orientation en toute confiance. Pour améliorer l’orientation scolaire et professionnelle des 15-25 ans, elle développe des applications web et du contenu pédagogique notamment vidéo pour simplifier la découverte des métiers et le choix d’une formation post-bac.')
             ;
        $manager->persist($job1);

        $job2 = new JobOffer('');
        $job2->setTitle('Scrum Master confirmé(e) H/F')
             ->setDescription('DSI Group est une entreprise internationale de conseil en management, technologies et intégration, nous intervenons sur plusieurs métiers : télécoms, SI, Infrastructure et internet des objets (IOT).
Notre mission est d’assurer un service de haut niveau tout en accordant une grande importance à la satisfaction et au développement professionnel de nos collaborateurs.

La confiance, le respect, la créativité, l’évolution de carrière et la reconnaissance constituent les fondations du DSI Group.

Pour accompagner notre entreprise dans sa croissance, nous recherchons un(e) : Scrum Master confirmé(e) H/F.')
             ;
        $manager->persist($job2);

        $job3 = new JobOffer('');
        $job3->setTitle('Developpeur backend PHP / Symfony')
             ->setDescription('Dans le cadre d\'une création de poste, nous sommes à la recherche d\'un candidat pour le poste de Développeur Back-end PHP / SYMFONY H/F. Notre client est spécialisé dans le reconditionnement de matériel numérique, en pleine croissance ils sont à la recherche de leurs futurs collaborateurs. Le poste proposé est un CDI temps plein basée à Nantes. Vous travaillerez au sein d\'une équipe dynamique et bienveillante qui travaille en méthodologie Scrum.')
             ;
        $manager->persist($job3);

        $candidacy = new Candidacy();
        $candidacy->setCandidate($candidate1)
                   ->setJobOffer($job1) 
                   ;
        $manager->persist($candidacy); 

        $candidacy = new Candidacy();
        $candidacy->setCandidate($candidate2)
                   ->setJobOffer($job2) 
                   ;
        $manager->persist($candidacy);

        $candidacy = new Candidacy();
        $candidacy->setCandidate($candidate3)
                   ->setJobOffer($job2) 
                   ;
        $manager->persist($candidacy);

        $candidacy = new Candidacy();
        $candidacy->setCandidate($candidate2)
                   ->setJobOffer($job1) 
                   ;
        $manager->persist($candidacy);




        $manager->flush();
        
        
        
        
        
        
        
        
        
    }
}
