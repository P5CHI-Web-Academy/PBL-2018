<?php
/**
 * Created by PhpStorm.
 * User: eejova
 * Date: 12/5/18
 * Time: 4:23 PM
 */

namespace AdministrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class ChangePassword extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        //
        $builder
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                [
                'constraints' => array(
                    new NotBlank(),
                    /** Validates that a value is not blank
                     * - meaning not equal to a blank string, a blank array, null or false:
                     */
                    new Length(array('min' => 8)),
//                    new Length(array('max' => 20)),
                )

                ]));
        $builder
            ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repeat Password'),
            ));
    }

/** error_mapping**/

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => \AdministrationBundle\Entity\User::class,
        ));
    }
}
