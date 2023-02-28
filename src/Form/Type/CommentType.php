<?php

namespace App\Form\Type;

use App\Entity\Actualite;
use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenu', TextareaType::class, [
            'label' => 'Votre message'
        ])->add('actualite', HiddenType::class)->add('send', SubmitType::class,
        [
            'label' => 'Envoyer'
        ]);

        $builder->get('actualite')
            ->addModelTransformer(new CallbackTransformer(
                fn(Actualite $actualite) => $actualite->getId(),
                fn(Actualite $actualite) => $actualite->getTitre()
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class
        ]);
    }
}