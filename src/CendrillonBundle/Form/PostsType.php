<?php

namespace CendrillonBundle\Form;

use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('post_date', null, ["label"=>"Date:"])
            ->add('post_content',null, ["label"=>"Contenu:"])
            ->add('post_title', null, ["label"=>"Titre:"])
            ->add('read_',null, ["label"=>"Lu?:"])
            ->add("validate",SubmitType::class, ["label"=>"valider"]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CendrillonBundle\Entity\Posts'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cendrillonbundle_posts';
    }

}
