<?php

namespace App\Form;

use App\Entity\OffreDemploi;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class OffreDemploiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                'label'=> 'Titre',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('experience')
            ->add('contratType',ChoiceType::class, [
                'label' => 'Type de contrat',
                'choices'  => [
                    'CDI' => 'contrat à durée indéterminée',
                    'CDD' => 'contrat à durée déterminée',
                    'CTT ' => 'contrat temporaire',
                ]
                ])
            ->add('horaires',ChoiceType::class, [
                'label' => 'Type de contrat',
                'choices'  => [
                    'temps plein ' => 'Temps plein ',
                    'temps partiel' => 'temps partiel',
                ]
                ])
            ->add('region',TextType::class,[
                'label'=> 'Region',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('description')
            ->add('mission',CKEditorType::class, [
                'label' => 'Missions'
            ])
            ->add('profilRecherhcer',CKEditorType::class, [
                'label' => 'Profil recherhcé'
            ])
            ->add('posteAvantage',CKEditorType::class, [
                'label' => 'Aventage de poste'
            ])
            ->add('statut',CheckboxType::class,[
                'label' => "Activé  l'offre",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OffreDemploi::class,
        ]);
    }
}
