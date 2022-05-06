<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @var ObjectManager
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
     * @Route("/acticles", name="article.index")
     * @return Response
     */

    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'current_menu' => 'articles'
        ]);
    }

    /**
     * @Route("/acticles/{slug}-{id}", name="article.show", requirements={"slug": "[a-z0-9\-]*"})
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


        // $article = new Article();
        // $article->setTitle('Premier Article')
        //     ->setDescription('Premier article, présentation')
        //     ->setOnline(true);
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($article);
        // $em->flush();