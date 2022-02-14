<?php

namespace App\Form;

use App\Entity\Personnage;
use App\Entity\Classe;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class PersonnageType extends AbstractType
{
    
    

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
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
                $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
                //récupère le formulaire
                $form = $event->getForm();

                $this->addClassAtribut($form->getParent(), $form->getData(), $Classe);
    
            }
            
        );
        
    }
    // Ajoute La classe, les compétences, standard de vie, avantage culturel + select origine
    private function addClassAtribut(FormInterface $form, $data, $Classe)
    {
        
        $tabOrigine = [];

        foreach ($Classe["Classe"] as $classe){
        
            // compare le perso selectionné au JSON 
            if ($classe["nom"] == $data ) {
                //Vient chercher les compétences du personnage séléctionné pour les mettre dans le tableau
                $tabCompetences["competence"] = $classe["competence"];

                //Vient chercher l'origine du personnage dans le JSON pour la mettre dans le tableau
               
                foreach ($classe["Origine"] as $data) {
                    $tabOrigine[$data['nom']] = $data['nom'];
                }

                $form->add('standard_de_vie', TextType::class, [
                    'disabled'   => true,
                    'attr' => ['value' => $classe["standard de vie"]],
                ])
                ->add('avantage_culturel', TextType::class, [
                    'disabled'   => true,
                    'attr' => ['value' => $classe["Avantage culturel"]],
                ]);
               //add un champ form pour chaque champ de compétence
                foreach ($tabCompetences["competence"] as $key => $value) {
                    $form->add( $key, IntegerType::class, [
                        'disabled'   => true,
                        'attr' => ['value' =>  $value],
                    ]);
                }

                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'origine', ChoiceType::class, null, [
                        'choices'  =>  $tabOrigine,
                        'placeholder' => 'Séléctionnez une origine',
                        'mapped'=>false,
                        'auto_initialize' => false,  
                    ]
                );
                
                
               
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        
                        $form = $event->getForm();
                        $this->addOrigineAtribut($form->getParent(), $form->getData());
                    }
                  );
                $form->add($builder->getForm());

            }
            
        }
    }
    private function addOrigineAtribut(FormInterface $form, $data){
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabParticularite = [];
        foreach ($Classe["Classe"] as $value){
            foreach ($value["Origine"] as $origine){
             if ($origine["nom"] == $data ) {

                foreach ($origine["Particularite"] as $dataOrigine) {
                    $tabParticularite[$dataOrigine] = $dataOrigine;
                }


                $form->add('competence_favorite', TextType::class, [
                    'disabled'   => true,
                    'attr' => ['value' => $origine["competence favorite"]],
                ]);
                foreach ($origine["Attribut de base"] as $key => $value) {
                    $form->add( $key, IntegerType::class, [
                        'disabled'   => true,
                        'attr' => ['value' =>  $value],
                    ]);
                };
                $form->add('Particularite', ChoiceType::class, [
                    'label'    => 'Particularités',
                    'choices'  =>  $tabParticularite,
                    'multiple'=> true,
                    'expanded'=>true
                ]);
             }
            }

            
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
