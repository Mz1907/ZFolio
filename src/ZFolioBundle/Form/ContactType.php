<?php

namespace ZFolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre Nome'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail'
            ])
            ->add('message', TextareaType::class, 
                    [
                        'attr' => [
                            'placeholder' => 'Votre message'
                        ]
                    ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone'
            ])
                
            //->add('created', DateTimeType::class)
                
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le message'
            ])
            ->setMethod('POST')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ZFolioBundle\Entity\Contact'
        ));
    }
}