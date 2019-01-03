<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 21/12/2018
 * Time: 10:21
 */

namespace App\Controller\Booking;

use App\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{

    /**
     * Page d'accueil de notre Interface Web
     * @Route("/", name="index")
     * @return Response
     */
    public function index()
    {
        #return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");

        return $this->render('front/index.html.twig');

    }


    /**
     * Page d'accueil de notre Interface Web
     * @Route("/salle", name="home_salle")
     * @return Response
     */
    public function homeSalle()
    {
        $salles = [];

        return $this->render('salle/home-salle.html.twig', [
            'salles' => $salles
        ]);

    }


    /**
     * Page d'accueil de notre Interface Web
     * @Route("/salle/edit/{id}", name="salle_edit")
     * @return Response
     */
    public function salleEdit(Salle $salle)
    {
        $salles = [];

        return $this->render('salle/home-salle.html.twig', [
            'salles' => $salles
        ]);

    }

    /**
     * Page d'accueil de notre Interface Web
     * @Route("/salle/delete/{id}", name="salle_delete")
     * @return Response
     */
    public function salleDelete(Salle $salle)
    {
        $salles = [];

        return $this->render('salle/home-salle.html.twig', [
            'salles' => $salles
        ]);

    }


    /**
     * Page d'accueil de notre Interface Web
     * @Route("/salle/add", name="salle_new")
     * @return Response
     */
    public function salleNew()
    {
        $sale = new Salle();

        $form = null;

        return $this->render('salle/home-salle.html.twig', [
            'form' => $form
        ]);

    }



}