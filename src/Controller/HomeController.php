<?php
namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


class HomeController 
{
    /**
     * @var Environnement
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="home")
     * @param ArticleRepository $repository
     * @return Response
     */
    public function index(ArticleRepository $repository): Response
    {
        $article = $repository->findLatest();
        return new Response($this->twig->render('pages/home.html.twig', [
            'articles' => $article
        ]));
    }
    
}