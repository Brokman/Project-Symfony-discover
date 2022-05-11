<?php
namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\User;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AdminArticleController extends AbstractController 
{
    /**
     * @var ArticleRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.article.index") 
     * @return Response
     */
    public function index() : Response
    {
        $articles = $this->repository->findAll();
        return $this->render('admin/article/index.html.twig', compact('articles'));
    }

    /**
     * @Route("/admin/article/create", name="admin.article.new") 
     * @var User $user
     * @param Security $security
     * @param Request $request
     * @return Response
     */
    public function new(Request $request, Security $security) : Response
    {
        $user = $security->getUser();
        $article = new Article;
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() && !empty($user)){
            $article->setUserId($user);
            $this->em->persist($article);
            $this->em->flush();
            $this->addFlash('success', "Creation saved!");
            return $this->redirectToRoute('admin.article.index');
        }

        return $this->render('admin/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/article/edit/{id}", name="admin.article.edit", methods="GET|POST") 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(int $id, Request $request) 
    {
        $article = $this->repository->find($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', "Edition saved!");
            return $this->redirectToRoute('admin.article.index');
        }

        return $this->render('admin/article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/article/edit/{id}", name="admin.article.delete", methods="DELETE") 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(int $id, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->get('_token'))) {
            $article = $this->repository->find($id);
            $this->em->remove($article);
            $this->em->flush();
            $this->addFlash('success', "Deletion validated!");
        } else {
            $this->addFlash('failed', "Deletion failed! Your CSRF token isn't valide");
        }
        return $this->redirectToRoute('admin.article.index');
    }
}