<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class SubscribeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label'  => 'alta',
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
            ->add('send', SubmitType::class, array(
                'label'  => 'boto_subs',
            ));
    }

    public function getName()
    {
        return 'subscribe';
    }
}