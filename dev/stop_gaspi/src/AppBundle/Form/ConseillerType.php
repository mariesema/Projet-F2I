<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConseillerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('DateRendezVous', DateTimeType::class, array(
            'mapped' => false,
            'widget' => 'choice',
            'placeholder' => array(
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'
            ),
            'input' => 'datetime',
            'with_minutes' => true,
            'with_seconds' => false,
        ))
        ->add('Filtrer', ButtonType::class, array(
            'attr' => array('class' => 'btn'),
        ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Conseiller'
        ));
    }
}
