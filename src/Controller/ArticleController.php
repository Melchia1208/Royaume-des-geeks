<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    private $objectManager;
    private $articleRepository;
    private $categoryRepository;

    public function __construct(
        ObjectManager $objectManager,
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->objectManager = $objectManager;
        $this->categoryRepository = $categoryRepository;

    }


    /**
     * @param $category
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/article/{category}", name="article")
     */
    public function index($category)
    {
        $categories = $this->categoryRepository->findAll();

        $id = $this->categoryRepository->findBy(['name' => $category]);
        $articles = $this->articleRepository->findBy(['category' => $id]);





        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'page' => $category,
            'articles' => $articles,
            'categories' => $categories,
            'name' => $category,
        ]);
    }
}
