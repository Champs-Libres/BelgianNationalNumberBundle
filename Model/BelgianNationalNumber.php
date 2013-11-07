<?php

namespace CL\BelgianNationalNumberBundle\Model;

/**
 * A class that represent a Belgian National Number
 *
 * @author julien.fastre@champs-libres.coop
 */
class BelgianNationalNumber {
    
    private $inversed_date;
    
    private $daily_counter;
    
    private $control_digit;
    
    public function getInversedDate() {
        return $this->inversed_date;
    }

    public function getDailyCounter() {
        return $this->daily_counter;
    }

    public function getControlDigit() {
        return $this->control_digit;
    }

    public function setInversedDate($inversed_date) {
        $this->inversed_date = $this->_sanitize($inversed_date);
    }

    public function setDailyCounter($daily_counter) {
        $this->daily_counter = $this->_sanitize($daily_counter);
    }

    public function setControlDigit($control_digit) {
        $this->control_digit = $this->_sanitize($control_digit);
    }
    
    public function __toString() {
        return $this->getInversedDate()
                .'-'.$this->getDailyCounter()
                .'-'.$this->getControlDigit();
    }
    
    public function fromString($string) {
        $a = explode('-', $string);
        $this->setInversedDate($a[0]);
        $this->setDailyCounter($a[1]);
        $this->setControlDigit($a[2]);
    }
    
    private function _sanitize($string){
        return filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    }


    
}
