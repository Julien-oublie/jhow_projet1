<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Form\AttributAmelioresType;
use App\Form\PersoType;
use App\Form\RecompenceType;
use App\Form\ArmesType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EditPersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder
            ->add('personnage', PersoType::class)
            ->add('attribut_ameliores', AttributAmelioresType::class)
            ->add('numberArmes', IntegerType::class,[
                'label'=>'Nombre d\'armes gagné',
                'mapped'=>'false' 
            ])
            ->add('numberVertus', IntegerType::class,[
                'label'=>'Nombre de vertus gagné',
                'mapped'=>'false' 
            ])
            ->add('numberRecompences', IntegerType::class,[
                'label'=>'Nombre de recompences gagné',
                'mapped'=>'false' 
            ]);
            $builder->get('numberArmes')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addArmes($form->getParent(), $form->getData());
                } 
            );
            $builder->get('numberVertus')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addVertus($form->getParent(), $form->getData());
                } 
            );
            $builder->get('numberRecompences')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addRecompences($form->getParent(), $form->getData());
                } 
            );
            
    }
    public function addArmes(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'armes'.$i, ArmesType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    public function addVertus(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'vertus'.$i, VertusType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    public function addRecompences(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'recompence'.$i, RecompenceType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    /*'query_builder' => function(EntityRepository $er) use ($owner) {
                    return $er->createQueryBuilder('a')
                    ->join('a.senders', 'o')
                    ->where('o.id = :owner')
                    ->setParameter(':owner', $owner);
                }*/
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'validation_groups' => 'register'
        ]);
    }
}
