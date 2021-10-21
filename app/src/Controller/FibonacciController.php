<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Service\FibonacciCalculator;

class FibonacciController extends AbstractController
{

    /**
    * @Route("/fibonacci/display/{length?1}")
    */
    public function display(FibonacciCalculator $fibonacciCalculator, int $length): Response
    {
        
        $fibonacciCalculator->calculateFibonacciNumbers($length);
        
        return $this->render('fibonacci/display.html.twig', [
            'length' => $length,
            'fibonacciNumbers' => $fibonacciCalculator->getData()
        ]);
    }
}