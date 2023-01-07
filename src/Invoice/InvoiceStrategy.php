<?php

namespace StrategyPattern\Invoice;

use StrategyPattern\Order\Order;

interface InvoiceStrategy
{
	public function generate(Order $order);
}