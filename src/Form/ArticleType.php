<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('subtitle', TextType::class, ['label' => 'Sous-titre'])
            ->add('body', CKEditorType::class, [
                'label' => 'Contenu de l\'article',
                ])
            ->add('image', FileType::class, [
                'label' => 'Image de l\'article',
                'mapped' => false,
                'attr' => [
                    'accept' => 'image/*'
                ]])
            ->add('videolink', TextType::class, ['label' => 'Lien vers la vidéo'])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Choisissez une catégorie'])
            ->add('save', SubmitType::class, ['label' => 'Créer l\'article'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
