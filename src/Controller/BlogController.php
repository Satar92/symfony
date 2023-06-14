<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    public function show(int $id): Response
    {
        return new Response(
            '<html>
                <body>
                    <p>Voici le post numero ' . $id . '</p>
                </body>
            </html>'
        );
    }

    public function edit(int $id): Response
    {
        return new Response(
            '<html>
                <body>
                    <p>Nous editons le post n° ' . $id . '</p>
                </body>
            </html>'
        );
    }

}
