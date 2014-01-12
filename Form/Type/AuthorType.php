<?php

namespace Acme\Bundle\BookBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('books', 'collection', array(
                'type'          => new \Acme\Bundle\BookBundle\Form\Type\BookType(),
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\Bundle\BookBundle\Model\Author',
        ));
    }

    public function getName()
    {
        return 'author';
    }
}
