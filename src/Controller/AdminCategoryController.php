<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryModifyType;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/category", name="admin_category")
     */
    public function index(Request $request)
    {

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->objectManager->persist($category);
            $this->objectManager->flush();

            return $this->redirectToRoute('admin_category');
        }
        $categories = $this->categoryRepository->findAll();


        return $this->render('admin_category/index.html.twig', [
            'form' => $form->createView(),
            'categories' => $categories

        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/admin/deleteCategory/{id}", name="admin_delete_category")
     */
    public function deleteCategory($id){

        $delete = $this->categoryRepository->find($id);
        $this->objectManager->remove($delete);
        $this->objectManager->flush();

        return $this->redirectToRoute('admin_category');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/admin/modifyCategory", name="admin_modify_category")
     */
    public function modifyCategory(){

        if(isset($_POST)){

            $modify = $this->categoryRepository->find($_POST['Select']);
            $modify->setName($_POST['newname']);
            $this->objectManager->flush();
        }

        return $this->redirectToRoute('admin_category');
    }




}
