<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
   /**
     * @Route("/order", name="app_order")
     */
    public function showBillAction(OrderRepository $repo, CategoryRepository $brand, OrderDetailRepository $repo1, UserRepository $user): Response
        {
            $user = $this->getUser();
            $data[]=[
                    'id'=>$user->getId()
            ];
            $id = $data[0]['id'];
            $br = $brand->findAll();
            $order = $repo->findAll();
            $od = $repo1->abc($id);
            return $this->render('order/index.html.twig', [
                'order' => $order,
                'brand' => $br,
                'od' => $od,
            ]);
        }
}
