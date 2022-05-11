<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use App\Form\CommentType;
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

    public function __construct(CommentRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/article/comment/edit/{id}", name="article.comment.edit", methods="GET|POST") 
     * @param Request $request
     * @param Security $security
     * @var Comment $comment
     * @var User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(int $id, Request $request, Security $security)  : Response
    {
        $user = $security->getUser();
        $comment = $this->repository->find($id);
        $article = $comment->getArticleId();

        if(!empty($user) && ($user->getIsAdmin() || $user === $comment->getUserId()))
        {
            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $this->em->flush();
                $this->addFlash('success', "Edition saved!");
                return $this->redirectToRoute('article.show', [
                    'id' => $article->getId(),
                    'slug' => $article->getSlug()
                ], 301);
            }

            return $this->render('article/comment/edit.html.twig', [
                'comment' => $comment,
                'form' => $form->createView()
            ]);
        } else {

            $this->addFlash('failed', "You can't edit this comment, your are not the author nor an administrator");
            return $this->redirectToRoute('article.show', [
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }
        
    }

    /**
     * @Route("/article/comment/edit/{id}", name="article.comment.delete", methods="DELETE") 
     * @var Comment $comment
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(int $id, Request $request) : Response
    {
        $comment = $this->repository->find($id);

        if ($this->isCsrfTokenValid('delete' . $id, $request->get('_token'))) {
            $this->em->remove($comment);
            $this->em->flush();
            $this->addFlash('success', "Deletion validated!");
        } else {
            $this->addFlash('failed', "Deletion failed! Your CSRF token isn't valide");
        }

        $article = $comment->getArticleId();
        return $this->redirectToRoute('article.show', [
            'id' => $article->getId(),
            'slug' => $article->getSlug()
        ], 301);
    }
}