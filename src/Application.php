<?php

namespace StrategyPattern;

use StrategyPattern\Cart\Item;
use StrategyPattern\Cart\ShoppingCart;
use StrategyPattern\Order\Order;
use StrategyPattern\Invoice\TextInvoice;
use StrategyPattern\Invoice\PDFInvoice;
use StrategyPattern\Customer\Customer;
use StrategyPattern\Payments\CashOnDelivery;
use StrategyPattern\Payments\CreditCardPayment;
use StrategyPattern\Payments\PaypalPayment;

class Application
{
    public static function run()
    {
        $wendy = new Item('WENDY', 'The ReVe Festival 2022 - Birthday Photo Card' , 700);
        $mark = new Item('Mark Lee', '2 Baddies Photo Card', 2000);

        $cart = new ShoppingCart();
        $cart->addItem($wendy, 2);
        $cart->addItem($mark, 5);

        $customer = new Customer('David Aaron Echon', '#30 Graham Street, East Bajac-Bajac Olongapo City', 'echon.davidaaron@auf.edu.ph');
        
        $order = new Order($customer, $cart);

        $text_invoice = new TextInvoice();
        $order->setInvoiceGenerator($text_invoice);
        $text_invoice->generate($order);

        $cash_on_delivery = new CashOnDelivery($customer);
        $order->setPaymentMethod($cash_on_delivery);
        $order->payInvoice();
        
    }
}