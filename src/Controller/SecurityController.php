<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
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
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        $categories = $this->categoryRepository->findAll();
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'categories' => $categories,
            'page' => 'login']);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout () {

    }
}
