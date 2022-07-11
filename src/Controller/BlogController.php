<?php
// src/Controller/BlogController.php
namespace App\Controller;

// ...
use App\Entity\Categories;
use App\Form\CategoriesType;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function statistiques(
        CategorieRepository $CategRepo,
        ArticleRepository $artRepo
    ) {
        // Chercher toutes les catégories
        $categories = $CategRepo->findAll();

        $categNom = [];
        $categColor = [];
        $categCount = [];

        // Démonter les données
        foreach ($categories as $categorie) {
            $categNom[] = $categorie->getNom();
            $categColor[] = $categorie->getColor();
            $categCount[] = count($categorie->getArticles());
        }

        // Chercher le prix moyen des articles par catégorie
        $categorie = $artRepo->countByPrice();


        dd($categorie);

        return $this->render('accueil/stats.html.twig', [
            'categNom' => json_encode($categNom),
            'categColor' => json_encode($categColor),
            'categCount' => json_encode($categCount)
        ]);
    }
}
