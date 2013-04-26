<?php

namespace Muni\ConsejoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResolucionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resolucion')
            ->add('descripcion')
            ->add('monto')
            ->add('tieneLimite', 'checkbox', array(
                "required" => false,
                
            ))
            ->add('fechaLimite')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Muni\ConsejoBundle\Entity\Resolucion'
        ));
    }

    public function getName()
    {
        return 'muni_consejobundle_resoluciontype';
    }
}
