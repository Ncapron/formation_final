<?php

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('file', 'file', array('label' => ' ', 'required' => false))
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                    'homme' => 'Homme',
                    'femme' => 'Femme'
                ),
                'required'    => true,
                'placeholder' => 'Selectionnez votre sexe',
                'empty_data'  => null
            ))
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('tel')
            ->add('mail')
            ->add('datenaissance', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
            ->add('promotion')
            ->add('archive')
            ->add('filecv', 'file', array('label' => ' ', 'required' => false))
            ->add('filecva', 'file', array('label' => ' ', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormationBundle\Entity\Eleve'
        ));
    }
}
