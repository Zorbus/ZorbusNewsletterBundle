<?php

namespace Zorbus\NewsletterBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MaxLength;

class NewsletterAdmin extends Admin
{

    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('Identification')
                ->add('title', null, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank(),
                        new MaxLength(array('limit' => 255))
                    )  
                ))
                ->add('description', 'textarea', array(
                    'required' => false, 
                    'attr' => array('class' => 'ckeditor'),
                    'constraints' => array(
                        new NotBlank()
                    )
                ))
                ->add('lang', null, array('required' => false))
                ->add('enabled', null, array('required' => false))
                ->end()
                ->with('Body')
                ->add('url', null, array('required' => false))
                ->add('body', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('title')
                ->add('enabled')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('title')
                ->add('enabled')
        ;
    }

    public function configureShowFields(ShowMapper $filter)
    {
        $filter
                ->add('title')
                ->add('description')
                ->add('lang')
                ->add('enabled')
                ->add('url')
                ->add('body')
        ;
    }

    public function prePersist($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

    public function preUpdate($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

}