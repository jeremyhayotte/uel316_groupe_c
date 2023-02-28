<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Repository\ActualiteRepository;
use App\Repository\CommentaireRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    #[Route('/ajax/commentaires', name: 'comment_add')]
    public function add(Request $request, ActualiteRepository $actualiteRepo, UserRepository $userRepo, EntityManagerInterface $en, CommentaireRepository $commentRepo): Response
    {
        $commentData = $request->request->all('comment');
        if (!$this->isCsrfTokenValid('commentaire-add', $commentData['_token'])) {
            return $this->json([
                'code' => 'INVALID_CSRF_TOKEN'
            ], Response::HTTP_BAD_REQUEST);
        }

        $actualite = $actualiteRepo->findOneBy(['id' => $commentData['actualite']]);

        if (!$actualite) {
            return $this->json([
                'code' => "ACTUALITY_NOT_FOUND"
            ], Response::HTTP_BAD_REQUEST);
        }

        $comment = new Commentaire($actualite);
        $comment->setContenu($commentData['content']);
        $comment->setUser($userRepo->findOneBy(['id' => 1]));
        $comment->setCreatedAt(new \DateTime());

        $en->persist($comment);
        $en->flush();

        $html = $this->renderView('commentaire/index.html.twig', [
            'comment' => $comment
        ]);

        return $this->json([
            'code' => 'COMMENT_ADDED_SUCCESSFULLY',
            'message' => $html,
            'numberOfComments' => $commentRepo->count(['actualite' => $actualite])
        ]);
    }
}
