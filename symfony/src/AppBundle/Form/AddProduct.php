<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
//Code Review Videos

class AddProduct extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('attr' => array('placeholder' => 'Your name', 'class' => 'col-xs-10 col-sm-6', 'id' => 'form-field-1'),
                'constraints' => array(
                    new NotBlank(array("message" => "Please provide your name")),
                )
            ))
            ->add('price', TextType::class, array('attr' => array('placeholder' => 'Price', 'class' => 'form-control', 'id' => 'form-field-1-1'),
                'constraints' => array(
                    new NotBlank(array("message" => "Please give a Price")),
                )
            ))
            ->add('description', TextareaType::class, array('attr' => array('placeholder' => 'Your description address'),
                'constraints' => array(
                    new NotBlank(array("message" => "Please provide a valid description")),
                )
            ))
            ->add('avatar', FileType::class, array('attr' => array('id' => 'id-input-file-2'),
            	'constraints' => array(
            		new NotBlank(array("message" => "Please provide a valid avatar")), 
            		new File(array("mimeTypes" => array("image/*"))),
            	)
            ))
            ->add('number', TextType::class, array('attr' => array('placeholder' => 'Your number here', 'class' => 'input-sm', 'id' => 'form-field-4'),
                'constraints' => array(
                    new NotBlank(array("message" => "Please provide a message here")),
                )
            ))
            ->add('pro_imagess', FileType::class, array('attr' => array('multiple' => 'multiple', 'required' => false),
            	'constraints' => array(
            		new File(array("mimeTypes" => array("image/*"))),  
            	)
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}