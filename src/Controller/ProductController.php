<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;



class ProductController extends AbstractController
{

    /**
     * Route który wyświetla sam formularz do tworzenia produktu, a zatem
     * nie robimy tu nic, poza renderowaniem templatki Twiga z tym formularzem.
     */
    #[Route('/product', name: 'app_product', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig',[
            'product_array' => $productRepository->findAll(),
        ]);
    }

    #[Route('/product/search', name: 'app_product_search', methods: ['GET'])]
    public function search(): Response
    {
        return $this->render('product/search.html.twig');
    }


    /**
     * W tym roucie zmieniamy akceptowalne methody z GET na POST, a zatem możemy mieć
     * dwa route z tą samą ścieżką '/product'.
     * W tej funkcji:
     * 1. Przyjmujemy dane z formularza; 
     * 2. Sprawdzamy, czy są puste; jeżeli są puste -> zwracamy komunikat z błędem.
     * 3. Jeżeli nie, tworzymy objekt klasy entity "Product" i wypełniamy go danymi, zapisujemy 
     * i zwracamy komunikat o poprawnym zapisaniu danych.
     */
    #[Route('/product', name: 'app_product_create', methods: ['POST'])]
    public function productCreate(Request $request, EntityManagerInterface $entityManager, ProductRepository $productRepository): Response
    {
        //Dla ułatwienia zapisujemy dane z requesta do osobnej zmiennej. 
        //Jako że metoda requesta to POST a nie GET, musimy pobrać dane z $request->request zamiast ->query.
        $formData = $request->request;

        $productName = $formData->get('name');
        $productDescription = $formData->get('description');

        //Liczby z formularza dalej dostaniemy w postaci tekstu(string).
        //Musimy je przekształcić na faktyczne liczby! (integer)
        $productPrice = (int)$formData->get('price');

        if (!$formData->get('name')) {
            return $this->render('product/index.html.twig', [
                'message' => 'Dane formularza nie mogą być puste!',
            ]);
        }
        //Ten fragment kodu uruchomi się tylko jeżeli dane formularza zostały podane.
        //Zauważcie, że nie musimy tu ręcznie ustawiać ID produktu. 
        $product = new Product();
        $product->setName($productName);
        $product->setDescription($productDescription);
        $product->setPrice($productPrice);

        $entityManager->persist($product);
        //Dopiero wykonanie ->flush() tak naprawdę zapisuje dane do bazy danych!
        $entityManager->flush();

        return $this->render('product/index.html.twig', [
            'message' => 'Zapisano nowy produkt z ID: ' . $product->getId(), 
        ]);
    }
    #[Route('/api/product/search', name: 'app_api_product_search', methods: ['GET'])]
    public function productSearch(Request $request, ProductRepository $productRepository): Response
    {
        $searchQuery = $request->query->get('search_term');
        $foundItems = $productRepository->findByDescription($searchQuery);

        return $this->json($foundItems);
    }
}
