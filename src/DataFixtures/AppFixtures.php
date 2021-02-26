<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use \App\Entity\Categoria;
use App\Entity\Zapatilla;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0;$i<7;$i++){
            $fake = Factory::create();
            
            
            $cate = new Categoria();
            $cate->setNombre("A");
            for($j = 0;$j<5;$j++){
                $zapa = new Zapatilla();
                $zapa->setNombre($fake->name);
                $zapa->setDescripcion($fake->text);
                $zapa->setPrecio(50);
                $zapa->setUrlImagen($fake->imageUrl);
                $zapa->setCategoria($cate);
                $cate->addZapatillas($zapa);
            }
            
            
            $manager->persist($cate);
            
        }
        
        //Categoria
        /*
        $cate = new Categoria();
        $cate->setNombre("Zapatillas de correr");
        
        //Zapatillas
        $zapa1 = new Zapatilla();
        $zapa1->setNombre("Adidas SL20");
        $zapa1->setDescripcion("Ligeras y movimientos explosivos para tus entrenamientos");
        $zapa1->setPrecio(134);
        $zapa1->setUrlImagen("https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/zapatillas-running-adidas-sl20-1582287788.jpg?crop=1.00xw:0.669xh;0,0.300xh&resize=480:*");
        
        
        $zapa2 = new Zapatilla();
        $zapa2->setNombre("Adidas SL20");
        $zapa2->setDescripcion("Las zapatillas adidas Terrex Agravic Trail de mujer incorporan la tecnología Boost que te proporciona mayor amortiguación y un retorno de energía sin límites y una parte superior ultraligera que te permiten correr más rápido en rutas técnicas de montaña. La suela de goma con perfil dentado se inspira en el dibujo de los neumáticos Continental Trail King para bicis de montaña y se ha diseñado para controlar el terreno incluso en los descensos más vertiginosos.");
        $zapa2->setPrecio(78);
        $zapa2->setUrlImagen("https://cdn1.deporvillage.com/cdn-cgi/image/h=260,w=260,dpr=1,f=auto,q=75,fit=contain,background=white/product/ad-ef6889_001.jpg");
        
        
        
        $cate->addZapatillas();
         * 
         */
        
        $manager->flush();
    }
}
