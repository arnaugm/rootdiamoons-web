<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class UnsubscribeType
 * @package AppBundle\Form\Type
 */
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
                        'message' => 'subscribe.email.not_blank',
                    )),
                    new Email(array(
                        'message' => 'subscribe.email.valid_email',
                    )),
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