# Data Provider Example

[![Build Status](https://api.travis-ci.org/geshan/dataprovider-example.png)](https://travis-ci.org/geshan/dataprovider-example)

This is a simple example of using data provider in PHP Unit. It can be used to
write less test with multiple data sets keeping the code coverage high.

```php

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

```

The description of how use data provider in PHP Unit is provided in my 
[blog post](geshan.blogspot.com/2014/02/using-phpunit-data-provider-for-less.html).


## Tests

You can run composer update

```

~> composer update --prefer-dist

```

and then run the tests using the command below on the folder where the repo is 
cloned.

```

phpunit --bootstrap=vendor/autoload.php tests


```