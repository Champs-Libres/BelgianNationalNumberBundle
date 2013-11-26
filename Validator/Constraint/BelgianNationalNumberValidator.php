<?php


namespace CL\BelgianNationalNumberBundle\Validator\Constraint;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use CL\BelgianNationalNumberBundle\Model\BelgianNationalNumber;


/**
 * Check the validity of belgian national number.
 * See http://www.ksz-bcss.fgov.be/fr/bcss/page/content/websites/belgium/services/docutheque/technical_faq/faq_5.html
 *
 * @author julien.fastre@champs-libres.coop
 */
class BelgianNationalNumberValidator extends ConstraintValidator {
    
    
    CONST CHECKER = 97;
    
    
    public function validate($value, Constraint $constraint) {
        
        if ($this->check($value) === false ) {
            $this->context->addViolation($constraint->message, array(
                '%string%' => $value
            ));
        }
    }
    
    /**
     * 
     * @param string $value
     * @return bolean
     */
    public function check($value) {
        $nationalNumber = new BelgianNationalNumber();
        $nationalNumber->fromString($value);
        
        //if before 2000...
        
        $date = (int) $nationalNumber->getInversedDate() 
                . $nationalNumber->getDailyCounter();
        
        $mod97 = $date % self::CHECKER;
        
        $checkDigit = self::CHECKER - $mod97;
        
        if ((string) $checkDigit == $nationalNumber->getControlDigit()) {
            return true;
        }
        
        //if after 2000
        
        $date = (int) '20'. $nationalNumber->getInversedDate() 
                . $nationalNumber->getDailyCounter();
        
        $mod97 = $date % self::CHECKER;
        
        $checkDigit = self::CHECKER - $mod97;
        
        if ((string) $checkDigit == $nationalNumber->getControlDigit()) {
            return true;
        }
        
        return false;
    }

}
