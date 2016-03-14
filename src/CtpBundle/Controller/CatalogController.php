<?php

namespace  Commercetools\Symfony\CtpBundle\Controller;

use Commercetools\Core\Client;
use Commercetools\Symfony\CtpBundle\Model\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Monolog\Handler\StreamHandler;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends Controller
{
    public function indexAction(Request $request)
    {
        /**
         * @var ProductRepository $repository
         */
        $repository = $this->get('commercetools.repository.product');

        $form = $this->createFormBuilder()
            ->add('search', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'search'))
            ->getForm();
        $form->handleRequest($request);

        $search = null;
        if ($form->isValid() && $form->isSubmitted() ){
            $search = $form->get('search')->getData();
        }

        list($products, $offset) = $repository->getProducts($request->getLocale(), 12, 1, 'price asc', 'EUR', 'DE', $search);

        return $this->render('CtpBundle:catalog:index.html.twig', array(
            'products' => $products,
            'form' => $form->createView()
        ));
    }

    public function detailAction(Request $request, $slug)
    {
        /**
         * @var ProductRepository $repository
         */
        $repository = $this->get('commercetools.repository.product');

        $product = $repository->getProductBySlug($slug, $request->getLocale());

        $variantIds = [];

        foreach ($product->getAllVariants() as $variant) {
            $variantIds[] = [
                'id' => $variant->getId(),
                'sku' => $variant->getSku()
            ];
        }
        return $this->render('CtpBundle:catalog:product.html.twig', array(
            'product' =>  $product
        ));
    }
}