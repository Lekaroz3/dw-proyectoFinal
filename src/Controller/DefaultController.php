<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Zapatilla;
use App\Entity\Categoria;

class DefaultController extends AbstractController
{
    /**
     * @Route("/{cate}", name="homepage")
     */
    public function index(Request $req,$cate = "*"): Response
    {
        if ($req->getMethod()=='POST'){
            
            $de = $req->request->get('categoria');
            if ($de == "nada") {
                $de = "*";
            }
        } else{
            $de = "*";
        }
        if ($de == "*") {
            $zapas = $this->getDoctrine()->getRepository('App:Zapatilla')->findOrderByPrice();
        }else{
            $zapas = $this->getDoctrine()->getRepository('App:Zapatilla')->getAllZapaByCategory($de);
        }
        
        $cates =$this->getDoctrine()->getRepository('App:Categoria')->findAll();

        
        return $this->render('default/zapas.html.twig', [
            'zapatillas' => $zapas,
            'categorias' => $cates,
            'de'=>$de,
        ]);
    }
}
