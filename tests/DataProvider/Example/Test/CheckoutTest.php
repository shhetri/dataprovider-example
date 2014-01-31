<?php

namespace DataProvider\Example\Test;

use DataProvider\Example\Checkout;
use PHPUnit_Framework_TestCase;

/**
 * Checkout test for Cash and Credit card
 */
class CheckoutTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var Checkout
     */
    protected $checkout;
    
    public function setup()
    {
        $this->checkout = new Checkout();
    }
    
   /**
    * Data provider for testCalculateTotal
    * variables are in the order of
    * $paymentMethod, $expectedTotal
    * 
    * @return type
    */
    public function paymentMethodProvider()
    {
        return array(
            array('Cash', 100.00),
            array('Credit Card', 95.00)
        );
    }

    /**
     * Test to check if the order total is calculated correctly
     * for given payment method.
     * 
     * @param string $paymentMethod
     * @param float $expectedTotal
     * 
     * @dataProvider paymentMethodProvider
     */
    public function testCalculateTotal($paymentMethod, $expectedTotal)
    {
        $this->checkout->calculateTotal($paymentMethod);
        $this->assertEquals(
            $this->checkout->getTotal(), 
            $expectedTotal,
            sprintf('Testing total calculation for %s.', $paymentMethod)
        );
    }
    
}
