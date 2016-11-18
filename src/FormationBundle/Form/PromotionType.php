<?php

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('formateur')
            ->add('semaines', ChoiceType::class, array(
                'choices' => array(
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15'
                ),
                'required'    => false,
                'placeholder' => 'Selectionnez le nombre de semaines',
                'empty_data'  => null
            ))
            ->add('dateDebut', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
            ->add('dateFin', DateType::class, array(
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker'],
                'format' => 'dd-MM-yyyy'
            ))
            ->add('langage')
            ->add('archive')
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
