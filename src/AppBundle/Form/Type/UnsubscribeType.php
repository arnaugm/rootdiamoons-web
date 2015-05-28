<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class UnsubscribeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
                'label'  => 'baixa',
                'attr' => array(
                    'placeholder' => 'adreca',
                ),
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'unsubs not blank',
                    )),
                    new Email(),
                ),
            ))
            ->add('send', 'submit', array(
                'label'  => 'boto_unsubs',
            ));
    }

    public function getName()
    {
        return 'unsubscribe';
    }
}