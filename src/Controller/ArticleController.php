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
            'page' => $category,
            'articles' => $articles,
            'categories' => $categories,
            'name' => $category,
        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/article/show/{id}", name="article_show")
     */
    public function show($id){

        $article = $this->articleRepository->find($id);
        $category = $this->categoryRepository->find(['id'=>$article->getCategory()]);
        $nomCategorie = $category->getName();

        $categories = $this->categoryRepository->findAll();
        $link = $article->getVideolink();

            $videotab = explode('watch?v=', $link);




        return $this->render('article/show.html.twig', [
            'page' => $nomCategorie,
            'article' => $article,
            'categories' => $categories,
            'videotab' => $videotab,

        ]);

    }
}
