<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TirageController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('tirage/index.html.twig', [
            'controller_name' => 'TirageController',
        ]);
    }


    private function lanceTirage(int $n_num, int $n_tot_num): string
    {
        $str_tirage = "";
        $array_tirage = [];
        $numeros = range(1, $n_tot_num);
        shuffle($numeros);
        $array_tirage = array_slice($numeros, 0, $n_num);
        $str_tirage = 'Tirage: ' . implode('...', $array_tirage);
        return $str_tirage;
    }

    public function tirageLoto(): Response
    {
        return new Response(


            '<html>
                <body>
                    <h1>Tirage du loto</h1>
                    ' . $this->lanceTirage(6, 50) . '
                </body>
            
            </html>'
        );
    }
    public function tirageKeno(): Response
    {
        return new Response(


            '<html>
                <body>
                    <h1>Tirage du keno</h1>
                    ' . $this->lanceTirage(10, 70) . '
                </body>
            
            </html>'
        );
    }
}
