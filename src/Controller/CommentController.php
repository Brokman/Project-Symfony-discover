<?php

namespace App\Controller;

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


class CommentController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var CommentRepository
     */
    private $repository;
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(CommentRepository $repository, EntityManagerInterface $em, ArticleRepository $articleRepository)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Route("/articles/{slug}-{id}", name="article.comment.post", requirements={"slug": "[a-z0-9\-]*"})
     * @var User $user
     * @param Security $security
     * @param Request $request
     * @return Response
    */
    public function addComment(int $id, string $slug,Request $request, Security $security): Response
    {
        $comment = New Comment;
        $user = $security->getUser();
        dump($user);
        $article = $this->articleRepository->find($id);
        if ($article->getSlug() !== $slug) {
            return $this->redirectToRoute('article.show', [
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() && !empty($user)){
            $comment->setUserId($user);
            $comment->setArticleId($article);
            $this->em->persist($comment);
            $this->em->flush();
            $this->addFlash('success', "Comment add");
            return $this->redirectToRoute('article.show', [
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}