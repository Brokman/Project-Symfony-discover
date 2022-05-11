<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;


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
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $em, CommentRepository $commentRepository)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->commentRepository = $commentRepository;
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
     * @var User $user
     * @var Comment $comment
     * @param Security $security
     * @param Request $request
     * @return Response
    */
    public function show(int $id, string $slug, Request $request, Security $security): Response
    {
        $user = $security->getUser();
        $article = $this->repository->find($id);
        if ($article->getSlug() !== $slug) {
            return $this->redirectToRoute('article.show', [
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }

        if(!empty($user))
        {
            $comment = New Comment;
            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid() && !empty($user)) 
            {
                $comment->setUserId($user);
                $comment->setArticleId($article);
                $this->em->persist($comment);
                $this->em->flush();
                $this->addFlash('success', "Comment add");
                return $this->redirectToRoute('article.show', [
                    'id' => $article->getId(),
                    'slug' => $article->getSlug()
                ], 301);
            }elseif($form->isSubmitted()) {
                $this->addFlash('failed', "Comment could not be added");
            }

            return $this->render('article/show.html.twig', [
                'user' => $user,
                'article' => $article,
                'comment' => $comment,
                'form' => $form->createView(),
                'current_menu' => 'articles'
            ]);
        }

        return $this->render('article/show.html.twig', [
            'user' => $user,
            'article' => $article,
            'current_menu' => 'articles'
        ]);
    }
    
}