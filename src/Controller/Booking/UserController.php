<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 02/01/2019
 * Time: 14:39
 */

namespace App\Controller\Booking;


use App\Entity\Personne;
use App\Personne\PersonneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
#use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * Formilaire pour ajouter un utilisateur
     * @Route("/inscription",
     *     methods={"GET", "POST"},
     *     name="personne_inscription")
     * @param Request $request
     */
    public function inscription(Request $request){

        # Création d'un nouveau Utilisateur
        $personne = new Personne();

        # Création du Formulaire et traitement des données POST
        $form = $this->createForm(PersonneType::class, $personne)
            ->handleRequest($request);

        # Vérification des données du Formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # Insertion en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();

            # Notification
            $this->addFlash('notice',
                'Félicitation, vous pouvez vous connecter');

        }
        # Affichage du Formulaire dans la vue
        return $this->render('personne/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }
}