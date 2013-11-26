<?php

namespace CL\BelgianNationalNumberBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CL\BelgianNationalNumberBundle\Validator\Constraint\BelgianNationalNumberValidator;

class DefaultControllerTest extends WebTestCase
{
    public function testBefore2000()
    {
        $num = '720202-900-81';
        
        $result = $this->_getValidator()->check($num);

        $this->assertTrue($result);
    }
    
    public function testRandom() {
        $num = '1234567-890-12';
        
        $this->assertTrue(!$this->_getValidator()->check($num));
    }
    
    public function testAfter2000() {
        $num = '000125-567-77';
        
        $this->assertTrue(!$this->_getValidator()->check($num));
    }
    
    private function _getValidator() {
        $validator = new BelgianNationalNumberValidator();
        return $validator;
    }
}
