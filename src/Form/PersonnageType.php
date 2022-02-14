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
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                $tabCompetences = [];
                $data = $event->getForm()->getData();
                
                foreach ($Classe["Classe"] as $classe){
        
                    // compare le perso selectionné au JSON 
                    if ($classe["nom"] == $data ) {
                        //Vient chercher les compétences du personnage séléctionné pour les mettre dans le tableau
                        $tabCompetences["competence"] = $classe["competence"];

                        //Vient chercher l'origine du personnage dans le JSON pour la mettre dans le tableau
                        $standard_de_vie = $classe["standard de vie"];
                        $avantage_culturelle= $classe["Avantage culturel"];
                        foreach ($classe["Origine"] as $origine) {
                            $tabOrigine[$origine['nom']] = $origine['nom'];
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
                foreach ($tabCompetences["competence"] as $key => $value) {
                  
                    $form->getParent()
                    ->add( $key, IntegerType::class, [
                        'disabled'   => true,
                        'attr' => ['value' =>  $value],
                    ]);
                }
                
            }
            
        );
        
    
        
        
    }
   

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
