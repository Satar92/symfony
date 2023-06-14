<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TirageAleatoireController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('tirage_aleatoire/index.html.twig', [
            'controller_name' => 'TirageAleatoireController',
        ]);
    }

    public function tirage(string $nom_du_jeu, int $num_tires, int $num_total): Response
    {
        $tirage = $this->lanceTirage($num_tires, $num_total);
        return new Response(
            '<html>
                <body>
                    <h1>Tirage de ' . $nom_du_jeu . '</h1>
                    <p>' . $num_tires . ' numéro tirés sur ' . $num_total . ' </p>
                    <p> ' . $tirage . ' </p>
                </body>    
            </html>'
        
        );
    }
    private function lanceTirage(int $n_num, int $n_tot_num): string
    {
        $str_tirage = "";
        $array_tirage = [];
        $numeros = range(1, $n_tot_num);
        shuffle($numeros);
        $array_tirage = array_slice($numeros, 0, $n_num);
        $str_tirage = 'Tirage: ' . implode(' .. ', $array_tirage);
        return $str_tirage;
    }
}
