<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DashboardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Prix')
            ->add('PhotoTicket')
            ->add('DateAchat' , DateType::class, [
                                    'widget' => 'single_text',
                                    // this is actually the default format for single_text
                                    'format' => 'yyyy-MM-dd',
                                      ])
            ->add('DateGarantie', DateType::class, [
                                    'widget' => 'single_text',
                                    // this is actually the default format for single_text
                                    'format' => 'yyyy-MM-dd',
                                    ])
            ->add('LieuAchat')
            ->add('ZoneSaisie')
            ->add('Notice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
