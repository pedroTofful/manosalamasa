<?php

namespace App\Form;

use App\Entity\Restriccion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestriccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('restriccionDsc')
            ->add('perfil')
            ->add('receta')
            ->add('ingrediente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Restriccion::class,
        ]);
    }
}
