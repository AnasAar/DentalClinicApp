<?php

namespace App\Form;

use App\Entity\Medcin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedcinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_medcin')
            ->add('prenom_medcin')
            ->add('tel_medcin')
            ->add('email_medcin')
            ->add('cin_medcin')
            ->add('prix_visite')
            ->add('active')
            ->add('specialite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medcin::class,
        ]);
    }
}
