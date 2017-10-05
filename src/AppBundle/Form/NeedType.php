<?php

namespace AppBundle\Form;

use AppBundle\Entity\Client;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NeedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
           $data = $event->getData();
        });
        $builder
            ->add('date',DateType::class,array('widget' => 'single_text'))

            ->add('title')
            ->add('fullDescription')
            ->add('startAt',DateType::class, array(
                'widget' => 'single_text'))
            ->add('road')
            ->add('city')
            ->add('zipCode')
            ->add('rate')

            ->add('status',ChoiceType::class,[
                'choices'=>[
                    'Open'=>'1',
                    'Win'=>'2',
                    'Close'=>'3'
                ]
            ])
            ->add('factor1')
            ->add('factor2')
            ->add('factor3')
            ->add('tags',EntityType::class,['class'=>'AppBundle\Entity\Tag','choice_label'=>'libelle','multiple'=>'true','expanded'=>'true'])
            ->add('client', EntityType::class,array(
                'class'=>'AppBundle\Entity\Client',
                'choice_label'=>'nom',

            ))
            ->add('save',SubmitType::class);

        $formModifier = function (FormInterface $form, Client $client = null) {
            $contacts = null === $client ? array() : $client->getContacts();

            $form->add('contactName', EntityType::class, array(
                'class' => 'AppBundle\Entity\Contact',
                'placeholder' => '',
                'choices' => $contacts,
                'choice_label'=>'name'

            ));
        };
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getClient());
            }
        );

        $builder->get('client')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {


                // this would be your entity, i.e. SportMeetup
                $data = $event->getForm()->getData();

                    $formModifier($event->getForm()->getParent(), $data);
            }
        );
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
