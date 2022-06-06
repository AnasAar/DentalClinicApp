<?php

namespace App\Form;

use App\Entity\Lignetraitement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LignetraitementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_dent')
            ->add('date_debut')
            ->add('date_fin')
            ->add('type_traitement')
            ->add('fiche')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lignetraitement::class,
        ]);
    }
}
