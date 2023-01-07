<?php

namespace StrategyPattern\Invoice;

use StrategyPattern\Invoice\InvoiceStrategy;
use StrategyPattern\Order\Order;

class PDFInvoice implements InvoiceStrategy
{
	public function generate(Order $order)
	{
		echo "GENERATE A PDF INVOICE\n";
		echo "Customer: {$order->getName()} <{$order->getEmail()}>\n";
		echo "-----------------ORDER ITEMS------------------\n";
		foreach ($order->getItems() as $itemData)
		{
			$item = $itemData['item'];
			$quantity = $itemData['quantity'];

			echo $item->getName() . "\t" . $quantity . "\t" . $item->getPrice() . "\t=\t" . ($quantity * $item->getPrice()) . "\n";
		}
		echo "\t\tTotal\t=\t" . $order->getTotal() . "\n";
	}
}