<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document\Invoice;

class Amount
{
	private string $rawAmount;
	public string $amount;

	public function __construct(string $amount, string $format = '%.2f')
	{
		$this->rawAmount = $amount;
		$this->amount = $this->format($format);
	}

	public function format(string $format): string
	{
		return sprintf($format, $this->rawAmount);
	}
}