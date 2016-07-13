<?php

namespace Tests\Checkout\Checkout;


use Checkout\Cart\BasicCart;
use Checkout\Checkout\BasicCheckout;
use Checkout\Item\BasicItem;

class BasicCheckoutTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_calculate_discounts_last()
    {
        $checkout = BasicCheckout::createBasicCheckout();

        $cart = new BasicCart();

        $cart->addItem(new BasicItem('AAA'), 4);
        $cart->addItem(new BasicItem('BBB'), 4);
        $cart->addItem(new BasicItem('AAA'), 2);
        $cart->addItem(new BasicItem('CCC'), 6);

        $price = $checkout->calculate($cart);
        
        $this->assertEquals($price, 525.45, 'Price is not equal');
    }
}
