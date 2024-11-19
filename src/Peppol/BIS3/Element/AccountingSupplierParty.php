<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use DOMDocument;
use DOMElement;

use Projom\Peppol\BIS3\Segment\ELementInterface;

class AccountingSupplierParty implements ELementInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): AccountingSupplierParty
	{
		return new AccountingSupplierParty($data);
	}

	public function build(DOMDocument $document): DOMElement
	{
		$supplierParty = $document->createElement('cac:AccountingSupplierParty');
		return $supplierParty;
	}

	public function validate(): array
	{
		return [];
	}
}
