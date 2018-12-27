<?php
/**
 * Created by PhpStorm.
 * User: filpatterson
 * Date: 30.11.18
 * Time: 12:56
 */

namespace AdministrationBundle\Form;

use AdministrationBundle\Entity\Schedule;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;   //if there are fields that require any value
use Symfony\Component\Validator\Constraints\Length; //set length of string
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AdministrationBundle\Entity\Slide;  //show to which class it is referred
use AdministrationBundle\Entity\Tag;

class SlideType extends AbstractType {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        //
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 45]),
                ]
            ])
            ->add('periodOfValidity', IntegerType::class, array())
            ->add('startDate', DateType::class, array(
                'input' => 'datetime',
            ))
            ->add('endDate', DateType::class, array(
                'input' => 'datetime',
            ))
            ->add('enabled', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            -> add('content', CKEditorType::class, array())
            -> add('tags', EntityType :: class, array(
                'class' => Tag :: class,
                'choice_label' => 'tag',
                'multiple' => true,
            ))
            -> add('step', IntegerType::class, array())
            -> add('activeTimeStart', TimeType::class, array(
                'input' => 'datetime'
            ))
            -> add('activeTimeEnd', TimeType::class, array(
                'input' => 'datetime'
            ))
            ->add('typeOfSchedule', ChoiceType::class, [
                'choices' => [
                    'Day' => 1,
                    'Week' => 2,
                    'Month' => 3,
                ]
            ])
            ->add('schedule', EntityType::class, array(
                'class' => Schedule::class,
                'choice_label' => 'day',
                'multiple' => true,
            ));
    }

    //specify type of data that is used in this form

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'data_class' => Slide::class,
        ));
    }
}