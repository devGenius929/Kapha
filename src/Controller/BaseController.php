<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Entity\Categoria;
use App\Entity\Option;
use App\Entity\Pagina;
use App\Form\ContactoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{


    public function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $header = $this->getDoctrine()->getRepository(Option::class)->find(1);
        $footer = $this->getDoctrine()->getRepository(Option::class)->find(2);

        $parameters["header"] = json_decode($header->getContent(), true);
        $parameters["footer"] = json_decode($footer->getContent(), true);

        return parent::render($view, $parameters, $response); // TODO: Change the autogenerated stub
    }


}
