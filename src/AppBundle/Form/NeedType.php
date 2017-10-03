<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NeedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',DateType::class,array('widget' => 'single_text'))
            ->add('contactName')
            ->add('title')
            ->add('fullDescription')
            ->add('startAt',DateType::class, array(
                'widget' => 'single_text'))
            ->add('road')
            ->add('city')
            ->add('zipCode')
            ->add('rate')
            ->add('consultantName')
            ->add('status')
            ->add('factor1')
            ->add('factor2')
            ->add('factor3')
            ->add('client', EntityType::class,array(
                'class'=>'AppBundle\Entity\Client',
                'choice_label'=>'nom',

            ))
            ->add('commercial',EntityType::class,array(
                'class'=>'AppBundle\Entity\User',
                'choice_label'=>'email',

                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Need'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_need';
    }


}
