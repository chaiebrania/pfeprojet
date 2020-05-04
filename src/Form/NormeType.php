<?php

namespace App\Form;

use App\Entity\Norme;
use App\Form\NormeinstrumentType;
use App\Entity\InstrumentSpecifique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class NormeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('instrumentSpecifique',EntityType::class,[
            'class'=>InstrumentSpecifique::class,
            'label'=>'code',
            'placeholder'=>'--choisir--'
        ])
        -> add('normees', CollectionType::class, [
            'entry_type' => NormeinstrumentType::class,
            'label'=>'Norme',
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
            'allow_delete' => true,

        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Norme::class,
        ]);
    }
}
