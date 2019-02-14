<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\LivresRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivresController extends AbstractController
{

    private $livresRepository;
    private $objectManager;
    private $articleRepository;
    private $categoryRepository;

    public function __construct(
        ObjectManager $objectManager,
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
        LivresRepository $livresRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->objectManager = $objectManager;
        $this->categoryRepository = $categoryRepository;
        $this ->livresRepository = $livresRepository;

    }
    /**
     * @Route("/livres", name="livres")
     */
    public function index()
    {
        $livres = $this->livresRepository->findAll();
        $categories = $this->categoryRepository->findAll();


        return $this->render('livres/index.html.twig', [
            'controller_name' => 'LivresController',
            'livres' => $livres,
            'page' => 'livres',
            'categories' => $categories,
        ]);
    }
}
