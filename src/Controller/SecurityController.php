<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController 
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserRepository $repository, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->encoder = $encoder;
    }

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils 
     * @return Response
     */
    public function login (AuthenticationUtils $authenticationUtils) : Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        if(!$error) {
        $this->addFlash('success', "You are now logged in");
        }
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        $this->addFlash('notice', "You are now logged out");
    }

    /**
     * @Route("/admin/users/index", name="admin.users.index") 
     * @return Response
     */
    public function index() : Response
    {
        $users = $this->repository->findAll();
        return $this->render('admin/users/index.html.twig', [
            'current_menu' => 'users',
            'users' => $users
        ]);
    }

    /**
     * @Route("/login/create", name="login.create")
     * @param Request
     * @return Response
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder) : Response
    {
        $user = new User; 
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($encoder->encodePassword($user, $form->get('password')->getData()));
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash('success', "New profile saved!");
            return $this->redirectToRoute('login');
        }

        return $this->render('security/create.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/users/edit/{id}", name="admin.users.admintoggle", methods="TOGGLE") 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toogleAdmin(int $id, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->get('_token'))) {
            $user = $this->repository->find($id);
            if ($user->getIsProtected()) {
                $this->addFlash('failed', "You can't modify this user!");
                return $this->redirectToRoute('admin.users.index');
            }
            $user->setIsAdmin(!$user->getIsAdmin());
            $this->em->flush();
            $this->addFlash('success', "Admin role toggled!");
        } else {
            $this->addFlash('failed', "Edition failed! Your CSRF token isn't valide");
        }
        return $this->redirectToRoute('admin.users.index');
    }

    /**
     * @Route("/admin/users/edit/{id}", name="admin.users.delete", methods="DELETE") 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(int $id, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->get('_token'))) {
            $user = $this->repository->find($id);
            if ($user->getIsProtected()) {
                $this->addFlash('failed', "You can't modify this user!");
                return $this->redirectToRoute('admin.users.index');
            }

            $defaultuser = $this->repository->find(2);
            $userArticles = $user->getArticles();
            if(!empty($userArticles))
            {
                
                foreach ($userArticles as $article) {
                    $article->setUserId($defaultuser);
                    $this->em->flush();
                }
            }
            $userComments = $user->getComments();
            if(!empty($userComments))
            {
                foreach ($userComments as $comment) {
                    $comment->setUserId($defaultuser);
                    $this->em->flush();
                }
            }
            $userVotes = $user->getApprovals();
            if(!empty($userVotes))
            {
                foreach ($userVotes as $vote) {
                    $vote->setUserId(NULL);
                    $this->em->flush();
                }
            }


            $this->em->remove($user);
            $this->em->flush();
            $this->addFlash('success', "Deletion validated!");
        } else {
            $this->addFlash('failed', "Deletion failed! Your CSRF token isn't valide");
        }
        return $this->redirectToRoute('admin.users.index');
    }
}