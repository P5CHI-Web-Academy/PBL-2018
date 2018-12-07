<?php
/**
 * Created by PhpStorm.
 * User: filpatterson
 * Date: 11/11/18
 * Time: 2:28 PM
 */

namespace AdministrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

use AdministrationBundle\Entity\Tag;

class TagType extends abstractType{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        //
        $builder
            //show that there can't be NULL value
            //set max length of string for name of tag
            ->add('Tag', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver){
        //show that we're working with Tag class of data
        $resolver->setDefaults([
            'data_class' => Tag::class,
        ]);
    }
}