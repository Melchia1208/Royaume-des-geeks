<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticleController extends AbstractController
{
    private $objectManager;
    private $articleRepository;

    public function __construct(
        ObjectManager $objectManager,
        ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->objectManager = $objectManager;

    }


    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function index()
    {

        $articles = $this->articleRepository->findAll();


        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController',
            'articles' => $articles,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/admin/createArticle", name="admin_create_article")
     */
    public function new(Request $request)
    {

        $articles = $this->articleRepository->findAll();

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('image')->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            try {$file->move('assets/uploads/', $fileName);}
            catch (FileException $e){}


            $article->setImage($fileName);




            $this->objectManager->persist($article);
            $this->objectManager->flush();

            return $this->redirectToRoute('admin_article');
        }


        return $this->render('admin_article/new.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'AdminArticleController',
            'articles' => $articles,
        ]);
    }
}
