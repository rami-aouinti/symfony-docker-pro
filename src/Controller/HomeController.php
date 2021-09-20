<?php

declare(strict_types=1);

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Product;
use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        $data = new SearchData();
        $data->page = (int)$request->get('page', 1);
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        [$min, $max] = $productRepository->findMinMax($data);
        $products = $productRepository->findSearch($data);

        if($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'content' => $this->renderView('shop/products.html.twig', ['products' => $products])
            ]);
        }

        return $this->render(
            'home/index.html.twig',
            [
                'products' => $products,
                'form' => $form->createView(),
                'min' => $min,
                'max' => $max
            ]
        );
    }
}
