<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ChessboardController extends AbstractController
{

    /**
    * @Route("/chessboard/display")
    */
    public function display(): Response
    {
        
        return $this->render('chessboard/display.html.twig', [
        ]);
    }
}