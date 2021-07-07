<?php

namespace App\Controller;

use App\Repository\ArticlesCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ArticlesCategorieController extends AbstractController
{
    /**
     * @Route("/ajax/categorie", name="articles_categorie")
     * @param ArticlesCategorieRepository $repository
     * @return Response
     */
    public function index(ArticlesCategorieRepository $repository, SerializerInterface $serializer): Response
    {

        $data = $repository->findAll();
        $data1 = $serializer->serialize($data, JsonEncoder::FORMAT, ["groups" => "article_categorie_page_ajax"]);
        return new JsonResponse($data1, Response::HTTP_OK, [], true);
    }
}
