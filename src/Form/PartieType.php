<?php

namespace App\Form;

use App\Entity\Partie;
use App\Entity\Personnage;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $tabJoueurs = [2=>2,3=>3,4=>4,5=>5,6=>6];

        $builder
            ->add('nom', TextType::class,[
                'attr'=>['placeholder' => 'Nom de l\'histoire'],
                'label'=>false
            ])
            ->add('Nombre',ChoiceType::class, [
                'choices'  =>  $tabJoueurs,
                'placeholder' => 'Nombre de joueurs',
                'mapped'=>false
            ])
            ->add('joueurs', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->Where('u.roles NOT LIKE \'%GAME_MASTER%\' ');
                },
                'choice_label' => 'pseudo',
                'choice_value'=>'pseudo',
                'placeholder' => 'Choisir un joueur',
                'multiple'=>true,
                'expanded'=>true,
                'attr'=>['style' => 'display:none;', 'class'=>'chxck'],
                'label'=>false

            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partie::class,
        ]);
    }
}
