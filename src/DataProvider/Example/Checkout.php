<?php

namespace DataProvider\Example;

/**
 * A simple test checkout class for the data provider example
 *
 */
class Checkout 
{
    protected $total;
    protected $cashOnDeliveryFee = 0;
    protected $subTotal;
    protected $paymentMethod;

    /**
     * Calculates total, if payment method is cash 5.00 is added as
     * post payment fees.
     * 
     * @param string $paymentMethod
     */
    public function calculateTotal($paymentMethod)
    {
        $this->subTotal = 95.00;
        if ($paymentMethod == 'Cash') {
            $this->cashOnDeliveryFee = 5.00;
        }
        
        $this->total = $this->subTotal + $this->cashOnDeliveryFee;
    }
    
    /**
     * 
     * @return type
     */
    public function getTotal()
    {
        return $this->total;
    }
    
    /**
     * 
     * @param type $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }
          
}
