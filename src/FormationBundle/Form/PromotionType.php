<?php

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('file', 'file', array('label' => ' ', 'required' => false))
            ->add('nomForm')
            ->add('prenomForm')
            ->add('semaines')
            ->add('dateDeb', 'date')
            ->add('dateFin', 'date')
            ->add('module')
            ->add('langage')
            ->add('intervenant')
            ->add('eleve')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormationBundle\Entity\Promotion'
        ));
    }
}
