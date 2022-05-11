<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var ArticleRepository
     */
    private $repository;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/articles", name="article.index")
     * @return Response
     */

    public function index(): Response
    {
        $article = $this->repository->findAllVisible();
        return $this->render('article/index.html.twig', [
            'current_menu' => 'articles',
            'articles' => $article
        ]);
    }

    /**
     * @Route("/articles/{slug}-{id}", name="article.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
    */

    public function show(int $id, string $slug): Response
    {
        $article = $this->repository->find($id);
        if ($article->getSlug() !== $slug) {
            return $this->redirectToRoute('article.show', [
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'current_menu' => 'articles'
        ]);
    }
}