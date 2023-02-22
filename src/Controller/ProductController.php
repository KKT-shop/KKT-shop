<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * @Route("/product")
 */ 
class ProductController extends AbstractController
{

    //ADMIN
    private ProductRepository $repo;
    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/productt", name="product_show")
     */
    public function readAllAction(): Response
    {
        $products = $this->repo->findAll();
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }
}