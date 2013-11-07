<?php

namespace CL\BelgianNationalNumberBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use CL\BelgianNationalNumberBundle\Model\BelgianNationalNumber;

/**
 * Transform a string into a National Number
 * and vice-versa
 *
 * @author julien.fastre@champs-libres.coop
 */
class StringToBelgianNationalNumberTransformer implements DataTransformerInterface {
    
    /**
     * 
     * @param \CL\BelgianNationalNumberBundle\Model\BelgianNationalNumber $value
     * @return string
     */
    public function reverseTransform($value) {
        if ($value === null) {
            return '';
        }
        
        return $value->__toString();
    }

    public function transform($value) {
        
        $national_number = new BelgianNationalNumber();
        
        if (null === $value) {
            return $national_number;
        }
        
        $national_number->fromString($value);
        
        return $national_number;
    }

}
