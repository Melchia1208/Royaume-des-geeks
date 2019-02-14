<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $objectManager;
    private $categoryRepository;

    public function __construct(
        ObjectManager $objectManager,
        CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->objectManager = $objectManager;

    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $categories = $this->categoryRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'page' => 'accueil',
            'categories' => $categories,
        ]);
    }
}
