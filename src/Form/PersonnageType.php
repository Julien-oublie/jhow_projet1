<?php

namespace App\Form;

use App\Entity\Personnage;
use App\Entity\Classe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PersonnageType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $persoJson = file_get_contents('../public/json/FichesPersos.json');
        $Classe = json_decode($persoJson,true);
        $number = count($Classe["Classe"]);
        $tabClasse = [null=>null];
        foreach ($Classe["Classe"] as $classe){
            $tabClasse[$classe["nom"]] = $classe["nom"];
        }
        
        $builder
            ->add('classe',ChoiceType::class, [
                'choices'  =>  $tabClasse,
            ])
            
            ->add('standard_de_vie')
           /* ->add('nom')
            ->add('corps')
            ->add('esprit')
            
            ->add('experience')
            ->add('courage')
            ->add('sagesse')
            ->add('dommage')
            ->add('parade')
            ->add('armure')
            ->add('camaraderie')
            ->add('prestige')
            ->add('avantage_culturelle')
            //->add('background')
            ->add('traits')
            ->add('vocation')
            ->add('tableofyears')
            ->add('espoir')
            ->add('endurance')
            ->add('competenceDeGroupe')
            ->add('vertus')
            ->add('competence')
            ->add('recompenses')
            ->add('groupes')*/
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $personnage = $event->getData();
            $form = $event->getForm();
            dump($personnage);
            if (!$personnage || null === $personnage->getId()) {
                $form->add('espoir', ChoiceType::class);
            }
        });
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
