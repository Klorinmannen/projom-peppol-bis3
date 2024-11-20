<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document\Invoice;

class Date
{
	private string $rawDate;
	public string $date;

	public function __construct(string $date, string $format = 'Y-m-d')
	{
		$this->rawDate = $date;
		$this->date = $this->format($format);
	}

	public function format(string $format): string
	{
		return date($format, strtotime($this->rawDate));
	}
}
