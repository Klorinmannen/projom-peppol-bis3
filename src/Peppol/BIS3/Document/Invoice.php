<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document;

use Projom\Peppol\BIS3\Document\Document;
use Projom\Peppol\BIS3\Document\Invoice\Config;

class Invoice extends Document
{
	private null|Config $config = null;

	public function __construct(array $data)
	{
		$this->config = new Config($data);
		$this->document = new DOM('1.0', 'UTF-8');
	}

	public static function create(array $data): Invoice
	{
		return new Invoice($data);
	}

	public function build(): void {}

	public function validate(): void {}
}
