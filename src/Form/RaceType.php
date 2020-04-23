<?php

namespace App\Form;

use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('track', ChoiceType::class, [
                'choices'  => [
                    'Track One' => 'Track One',
                    'Track Two' => 'Track Two',
                    'Track Three' => 'Track Three',
                ]])
            ->add('user',ChoiceType::class, [
                'choices'  => [
                    'admin' => 'admin',
                    'staff' => 'staff',
                    'user' => 'user',
                    'matt' => 'matt',
                    'leonardo' => 'leonardo',
                ]])
            ->add('time')
            ->add('completion', ChoiceType::class, [
                'choices'  => [
                    'Yes' => 'True',
                    'No' => 'False'
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Race::class,
        ]);
    }
}
