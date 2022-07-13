<?php
// src/Controller/BlogController.php
namespace App\Controller;

// ...*
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class BlogController extends AbstractController
{
    #[Route('/', name: 'blog_index')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'page_title' => 'Bienvenu sur votre dashboard d\'achats !',
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/stats', name: 'stats')]   
        public function statistiques(CategorieRepository $cateRepo){
            // chercher toutes les categories
        $categories = $cateRepo->findAll();

        $categNom = [];
        $categColor = [];
        $categCount = [];
        $categPrice = [];
        $categDateAchat = [];

        foreach($categories as $categorie){
            $categNom[] = $categorie->getNom();
            $categColor[] = $categorie->getColor();
            $categCount[] = count($categorie->getArticles());

            $temp = 0;
            foreach($categorie->getArticles() as $article){
                $temp += $article->getPrix();
            }
            $categPrice[] = $temp;
        }

        return $this->render('accueil/stats.html.twig', [
            'categNom' => json_encode($categNom),
            'categColor' => json_encode($categColor),
            'categCount' => json_encode($categCount),
            'categPrice' => json_encode($categPrice),
            ]);
        }
    }
