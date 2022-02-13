<?php

namespace App\Form;

use App\Entity\Personnage;
use App\Entity\Classe;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PersonnageType extends AbstractType
{
    
    

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $persoJson = file_get_contents('../public/json/FichesPersos.json');
        $Classe = json_decode($persoJson,true);
        $tabClasse = [];
        foreach ($Classe["Classe"] as $classe){
            $tabClasse[$classe["nom"]] = $classe["nom"];
        }
        
        $builder->add('nom')
                ->add('class',ChoiceType::class, [
                'choices'  =>  $tabClasse,
                'placeholder' => 'Séléctionnez une classe',
                'mapped'=>false     
                ]);
        

       

        $builder->get('class')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {

                $persoJson = file_get_contents('../public/json/FichesPersos.json'); // a voir pour changer plus tard
                $Classe = json_decode($persoJson,true);
                $tabOrigine = [];
                $data = $event->getForm()->getData();
                
                foreach ($Classe["Classe"] as $classe){
                    
                    if ($classe["nom"] == $data ) {
                        $standard_de_vie = $classe["standard de vie"];
                        $avantage_culturelle= $classe["Avantage culturel"];
                        foreach ($classe["Origine"] as $origine) {
                            $tabOrigine[$origine['nom']] = $origine['nom'];
                            dump($origine);
                            
                        }
                    }
                }
                
                $form = $event->getForm();
                $form->getParent()
                ->add('standard_de_vie', TextType::class, [
                    'disabled'   => true,
                    'attr' => ['value' => $standard_de_vie],
                ])
                ->add('avantage_culturel', TextType::class, [
                    'disabled'   => true,
                    'attr' => ['value' => $avantage_culturelle],
                ])
                ->add('origine',ChoiceType::class, [
                    'choices'  =>  $tabOrigine,
                    'placeholder' => 'Séléctionnez une origine',
                    'mapped'=>false     
                ]);
                
            }
            
        );
        
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
        
    }
   

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
