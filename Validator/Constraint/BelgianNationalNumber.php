<?php


namespace CL\BelgianNationalNumberBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;



/**
 * Check if the given string is a valid Belgian National Number
 *
 * @author julien.fastre@champs-libres.coop
 */
class BelgianNationalNumber extends Constraint {
    
    public $message = "%string% is not a valid Belgian national number";
    
    public function validatedBy() {
        return 'belgian_national_number';
    }
    
}
