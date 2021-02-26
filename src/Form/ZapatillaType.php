<?php

namespace App\Form;

use App\Entity\Zapatilla;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ZapatillaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('nombre',  TextType::class, array(
                            'label' => 'Nombre',
                            'attr' => array('class'=>'form-control  ')
                    ))
            ->add('descripcion',  TextType::class, array(
                            'label' => 'Descripcion',
                            'attr' => array('class'=>'form-control  ')
                    ))
            ->add('precio',  TextType::class, array(
                            'label' => 'Precio',
                            'attr' => array('class'=>'form-control  ')
                    ))
            ->add('urlImagen',  TextType::class, array(
                            'label' => 'Url Imagen',
                            'attr' => array('class'=>'form-control  ')
                    ))
                ->add('categoria',   EntityType::class, array(
                    'label' => 'Categoria',
                     'attr' => array('class'=>'form-control '),
                     'class' => Categoria::class,
                     'query_builder' => function(CategoriaRepository  $r)  {
                      return $r->getAllCategories();}
          ))
            ->add('save', SubmitType::class, array('label' => 'Continue',  'attr' => array('class'=>'btn btn-primary')))
          ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add another one',  'attr' => array('class'=>'btn btn-secondary')))
        ;
          
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Zapatilla::class,
        ]);
    }
}
