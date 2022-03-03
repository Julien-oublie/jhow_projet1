<?php

namespace App\Form;

use App\Entity\Personnage;
use App\Entity\Classe;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
                ])
                ->add('origine', ChoiceType::class, [
                    'choices'  => [],
                    'placeholder' => 'Séléctionnez une origine',
                    'mapped'=>false,
                    'auto_initialize' => false,  
                ])
                ->add('vocation', ChoiceType::class,[
                    'choices'  =>  [],
                    'placeholder' => 'Séléctionnez une origine vocation',
                    'mapped'=>false,
                    'auto_initialize' => false,  
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
        $builder->get('origine')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {         
                //récupère le formulaire
                $form = $event->getForm();
                $this->addOrigineAtribut($form->getParent(), $form->getData());
            }
            
        );
        $builder->get('vocation')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {   
                //récupère le formulaire
                $form = $event->getForm();
                $this->addVocationAtribut($form->getParent(), $form->getData());
            }
            
        );
        
    }
    // Ajoute La classe, les compétences, standard de vie, avantage culturel + select origine
    private function addClassAtribut(FormInterface $form, $formData, $allClasses)
    {    
        $tabOrigine = [];
        $tabVocation = [];
       
        foreach ($allClasses["Classe"] as $classe){
            
            // compare le perso selectionné au JSON 
            if ($classe["nom"] == $formData ) {
                
                //************On ajoute les champs relatifs à la classe************

                //Vient chercher les compétences du personnage séléctionné pour les mettre dans le tableau
                $tabCompetences["competence"] = $classe["competence"];

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
                 //************On ajoute les champs relatifs à la classe************
                
                

                //************ORIGINE************

                //Vient chercher l'origine du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["Origine"] as $data) {
                    $tabOrigine[$data['nom']] = $data['nom'];
                }
                //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'origine', ChoiceType::class, null, [
                        'choices'  =>  $tabOrigine,
                        'placeholder' => 'Séléctionnez une origine',
                        'mapped'=>false,
                        'auto_initialize' => false,  
                    ],
                );
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addOrigineAtribut($form->getParent(), $form->getData());
                    }
                  );

                  $form->add($builder->getForm());

                //************ORIGINE************


                //************VOCATION************

                //Vient chercher les vocations du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["Vocation"] as $data) {
                    $tabVocation[$data['nom']] = $data['nom'];
                }

               //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'vocation', ChoiceType::class, null, [
                        'choices'  =>  $tabVocation,
                        'placeholder' => 'Séléctionnez une origine vocation',
                        'mapped'=>false,
                        'auto_initialize' => false,  
                    ]
                );
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addVocationAtribut($form->getParent(), $form->getData());
                    }
                  );  
                $form->add($builder->getForm());
               

            }
            
        }
    }
    //Ajoute les champs particularités 
    private function addOrigineAtribut(FormInterface $form, $data){
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabParticularite = [];

        foreach ($Classe["Classe"] as $value){
    
            foreach ($value["Origine"] as $origine){
                if ($origine["nom"] == $data ) {

                    //On ajoute les champs relatifs aux origines
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
                    
                    //PARTICULARITES
                    //On ajoute toutes les particularitées dans le tableau
                    foreach ($origine["Particularite"] as $dataOrigine) {
                        $tabParticularite[$dataOrigine] = $dataOrigine;
                    }
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




    private function addVocationAtribut(FormInterface $form, $data){
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabVocations = [];
        foreach ($Classe["Classe"] as $value){
            foreach ($value["Vocation"] as $vocation){
            
                if ($vocation["nom"] == $data ){

                    foreach ($vocation["competences_favorites"] as $dataCompetencesFav) {
                        $tabVocations[$dataCompetencesFav] = $dataCompetencesFav;
                    }

                    $form->add('competences_favorites', ChoiceType::class, [
                        'label'    => 'competences favorites',
                        'choices'  =>  $tabVocations,
                        'multiple'=> true,
                        'expanded'=>true,
                        'empty_data' => 1
                    
                    ]);
                    
                    
                    $form->add('part_ombre', TextType::class, [
                        'disabled'   => true,
                        'attr' => ['value' => $vocation["part d'ombre"]],
                    ])
                    ->add('traits', TextType::class, [
                        'disabled'   => true,
                        'attr' => ['value' => $vocation["traits"]],
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
