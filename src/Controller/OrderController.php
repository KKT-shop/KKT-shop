<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="app_order")
     */
    public function readAllAction(OrderRepository $repo, CategoryRepository $brand): Response
        {
            $u = $this->getUser();
            $br = $brand->findAll();
            $order = $repo->findAll($u, true);
            return $this->render('order/index.html.twig', [
                'order' => $order,
                'brand' => $br
            ]);
        }
}
