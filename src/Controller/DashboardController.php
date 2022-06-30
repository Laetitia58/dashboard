<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ArticleRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\DashboardType;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'articles' => $articles
        ]);
    }

    #[Route("/", name: 'accueil')]
    public function accueil() {
        return $this->render('dashboard/accueil.html.twig', [
            'title' => "Bienvenue si t'as plus de 27ans :P !",
            'age' => 42
        ] );
    }

    #[Route("/dashboard/new", name:"dashboard_create")] 
    #[Route("/dashboard/{id}/edit", name:"dashboard_edit")]
    public function form(Article $article = null, Request $request, EntityManagerInterface $manager) {

        if(!$article){
            $article = new Article();
        }

      // $article->setNom("Nom d'exemple")
      // ->setLieuAchat("babou");

    //    $form = $this->createFormBuilder($article)
    //                 ->add('nom')
    //                 ->add('prix')
    //                 ->add('photoTicket')
    //                 ->add('dateAchat', DateType::class, [
    //                    'widget' => 'single_text',
    //                    // this is actually the default format for single_text
    //                    'format' => 'yyyy-MM-dd',
    //                ])
    //                 ->add('dateGarantie', DateType::class,[
    //                    'widget' => 'single_text',
    //                    // this is actually the default format for single_text
    //                    'format' => 'yyyy-MM-dd',
    //               ] )
    //                 ->add('lieuAchat')
    //                 ->add('zoneSaisie')
    //                 ->add('Notice')
    // 
    //                 ->getForm();


        $form = $this->createForm(DashboardType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$article->getId()){
                $article->setDateAchat(new \DateTime());
            }

            $article->setDateGarantie(new \DateTime());

            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('dashboard_show', ['id'=> $article->getId()]);

        }

        return $this->render('dashboard/create.html.twig', [
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !==null
        ]);
    }

    #[Route("/dashboard/{id}", name:'dashboard_show')]
    public function show(Article $article) {
        return $this->render('dashboard/show.html.twig', [
            'article' => $article
        ]);  
    }

}
