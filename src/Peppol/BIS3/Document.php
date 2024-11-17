<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use DOMDocument;
use Projom\Peppol\BIS3\Segment\AccountingCustomerParty;
use Projom\Peppol\BIS3\Segment\AccountingSupplierParty;
use Projom\Peppol\BIS3\Segment\PayeeParty;

class Document
{
	private array $data = [];
	private array $segments = [];
	private array $errors = [];
	private null|DOMDocument $document = null;

	public function __construct(array $data)
	{
		$this->data = $data;
		$this->document = new DOMDocument('1.0', 'utf-8');
	}

	public static function create(array $data): Document
	{
		return new Document($data);
	}

	public function build(): void
	{
		foreach ($this->data as $key => $data) {
			$this->segments[$key] = match ($key) {
				'AccountingCustomerParty' => AccountingCustomerParty::create($data),
				'AccountingSupplierParty' => AccountingSupplierParty::create($data),
				'PayeeParty' => PayeeParty::create($data),
				default => throw new \Exception("Invalid segment: $key", 400)
			};
		} 
	}	
}
