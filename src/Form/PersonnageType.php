<?php

namespace App\Form;

use App\Entity\Personnage;
use App\Entity\Classe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('classe',EntityType::class,[
                'class' => Classe::class,
                'choice_label' => 'nom',
                'required' => true,
            ])
            ->add('nom')
            ->add('corps')
            ->add('esprit')
            ->add('standard_de_vie')
            ->add('experience')
            ->add('courage')
            ->add('sagesse')
            ->add('dommage')
            ->add('parade')
            ->add('armure')
            ->add('camaraderie')
            ->add('prestige')
            ->add('avantage_culturelle')
            ->add('background')
            ->add('traits')
            ->add('vocation')
            ->add('tableofyears')
            ->add('espoir')
            ->add('endurance')
            ->add('competenceDeGroupe')
            ->add('vertus')
            ->add('competence')
            ->add('recompenses')
            ->add('groupes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
