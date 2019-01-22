<?php

namespace App\Controller;

use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivresController extends AbstractController
{

    private $livresRepository;

    public function __construct(LivresRepository $livresRepository)
    {
        $this ->livresRepository = $livresRepository;
    }
    /**
     * @Route("/livres", name="livres")
     */
    public function index()
    {
        $livres = $this->livresRepository->findAll();


        return $this->render('livres/index.html.twig', [
            'controller_name' => 'LivresController',
            'livres' => $livres,
            'page' => 'livres'
        ]);
    }
}
