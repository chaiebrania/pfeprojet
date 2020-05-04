<?php

namespace App\Form;

use App\Entity\Poste;
use App\Entity\Marque;
use App\Entity\InstrumentGenerale;
use App\Entity\InstrumentSpecifique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class InstrumentSpecifiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('InstrumentGenerale',EntityType::class,[
            'label'=>'Code',
            'class'=>InstrumentGenerale::class,
            'choice_label'=>'code',
            'placeholder'=>'--choisir--'
        ])
        ->add('Poste',EntityType::class,[
            'label'=>'poste',
            'class'=>Poste::class,
            'choice_label'=>'poste',
            'placeholder'=>'--choisir--'
        ])

       
        ->add('Marque',EntityType::class,[
            'label'=>'marque',
            'class'=>Marque::class,
            'choice_label'=>'marque',
            'placeholder'=>'--choisir--'
        ])
        ->add('etendumin',NumberType::class,[
            'label'=>'Etendu_min'])
        ->add('etendumax',NumberType::class,[
                'label'=>'Etendu_max'])
        ->add('datemisenservice', DateType::class, [
            'label'=>'date mis en service',
                    'widget' => 'choice',
                    
                ])
                ->add('frequencecalibrage',NumberType::class,[
                    'label'=>'frequence']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InstrumentSpecifique::class,
        ]);
    }
}
