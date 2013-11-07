<?php

namespace CL\BelgianNationalNumberBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use CL\BelgianNationalNumberBundle\Form\DataTransformer\StringToBelgianNationalNumberTransformer;

/**
 * Type which allow to enter the belgian national number
 *
 * @author julien.fastre@champs-libres.coop
 */
class BelgianNationalNumberType extends AbstractType {
    
    
    public function getName() {
        return 'belgian_national_number';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $transformer = new StringToBelgianNationalNumberTransformer();
        
        $builder->addModelTransformer($transformer);
        
        $builder->add('inversed_date', 'text', array(
            'max_length' => 9,
            'trim' => true,
            
        ));
        
        $builder->add('daily_counter', 'text', array(
            'max_length' => 3,
            'trim' => true
        ));
        
        $builder->add('control_digit', 'text', array(
            'max_length' => 2,
            'trim' => true
        ));
        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CL\BelgianNationalNumberBundle\Model\BelgianNationalNumber'
        ));
    }

}
