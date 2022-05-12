<?php
namespace App\Controller;

use App\Entity\Approval;
use App\Entity\Article;
use App\Form\ApprovalType;
use App\Repository\ApprovalRepository;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ApprovalController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var ApprovalRepository
     */
    private $repository;
    /**
     * @var ArticleRepository
     */
    private $articleRepository;
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(ApprovalRepository $repository, ArticleRepository $articleRepository, CommentRepository $commentRepository, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $repository;
        $this->articleRepository = $articleRepository;
        $this->commentRepository = $commentRepository;

    }


    /**
     * @Route("/articles/{slug}-{id}", name="approval", requirements={"slug": "[a-z0-9\-]*"}, methods="VOTE") 
     * @var User $user
     * @param Request $request
     * @return Response
     */
    public function voteArticle(int $id, string $slug, Request $request) : Response
    {
        $user = $this->getUser();
        $article = $this->articleRepository->find($id);

        if(!empty($user) && (!empty($request->get('_pos')) || !empty($request->get('_min')) )) {
            if ($this->isCsrfTokenValid('vote' . $id, $request->get('_token'))) {
                $userVotes = $user->getApprovals();
                foreach ($userVotes as $vote) {
                    if($vote->getArticleId() === $article) {
                        $approval = $vote;
                    }
                }

                $count = $article->getApproveCount();
                if(isset($approval)) {
                    if(($request->get('_pos')) && ($approval->getIsPositive() == false)) {
                        $count += 2;
                        $approval->setIsPositive(true);
                    } elseif(($request->get('_min')) && ($approval->getIsPositive() == true)) {
                        $count -= 2;
                        $approval->setIsPositive(false);
                    } else {
                        $this->addFlash('failed', "vote already have same value");
                        return $this->redirectToRoute('article.show', [
                            'id' => $article->getId(),
                            'slug' => $article->getSlug()
                        ], 301);
                    }   
                    $article->setApproveCount($count);
                    $this->em->flush();
                } else {
                    $approval = new Approval;
                    $approval->setUserId($user);
                    $approval->setArticleId($article);
                    $approval->setIsPositive($request->get('_pos'));
                    if($request->get('_pos')) {
                        $count += 1;
                    } elseif ($request->get('_min')) {
                        $count -= 1;
                    }
                    $article->setApproveCount($count);
                    $this->em->persist($approval);
                    $this->em->flush();
                }
                $this->addFlash('success', "Vote saved!");
                return $this->redirectToRoute('article.show', [
                    'id' => $article->getId(),
                    'slug' => $article->getSlug()
                ], 301);
            } else {
                $this->addFlash('failed', "Edition failed! Your CSRF token isn't valide");
            }               
        }

        return $this->redirectToRoute('article.show', [
            'id' => $article->getId(),
            'slug' => $article->getSlug()
        ], 301);
    }


    /**
     * @Route("/articles/{slug}-{id}/{commentId}", name="approval.comment", requirements={"slug": "[a-z0-9\-]*"}, methods="COMMENTVOTE") 
     * @var User $user
     * @param Request $request
     * @return Response
     */
    public function voteComment(int $commentId, int $id, string $slug, Request $request) : Response
    {
        $user = $this->getUser();
        $comment = $this->commentRepository->find($commentId);
        $article = $this->articleRepository->find($id);

        if(!empty($user) && (!empty($request->get('_pos')) || !empty($request->get('_min')) )) {
            if ($this->isCsrfTokenValid('vote' . $commentId, $request->get('_token'))) {
                $userVotes = $user->getApprovals();
                foreach ($userVotes as $vote) {
                    if($vote->getCommentId() === $comment) {
                        $approval = $vote;
                    }
                }

                $count = $comment->getApproveCount();
                if(isset($approval)) {
                    if(($request->get('_pos')) && ($approval->getIsPositive() == false)) {
                        $count += 2;
                        $approval->setIsPositive(true);
                    } elseif(($request->get('_min')) && ($approval->getIsPositive() == true)) {
                        $count -= 2;
                        $approval->setIsPositive(false);
                    } else {
                        $this->addFlash('failed', "vote already have same value");
                        return $this->redirectToRoute('article.show', [
                            'id' => $article->getId(),
                            'slug' => $article->getSlug()
                        ], 301);
                    }   
                    $comment->setApproveCount($count);
                    $this->em->flush();
                } else {
                    $approval = new Approval;
                    $approval->setUserId($user);
                    $approval->setCommentId($comment);
                    $approval->setIsPositive($request->get('_pos'));
                    if($request->get('_pos')) {
                        $count += 1;
                    } elseif ($request->get('_min')) {
                        $count -= 1;
                    }
                    $comment->setApproveCount($count);
                    $this->em->persist($approval);
                    $this->em->flush();
                }
                $this->addFlash('success', "Vote saved!");
                return $this->redirectToRoute('article.show', [
                    'id' => $article->getId(),
                    'slug' => $article->getSlug()
                ], 301);
            } else {
                $this->addFlash('failed', "Edition failed! Your CSRF token isn't valide");
            }               
        }

        return $this->redirectToRoute('article.show', [
            'id' => $article->getId(),
            'slug' => $article->getSlug()
        ], 301);
    }

}