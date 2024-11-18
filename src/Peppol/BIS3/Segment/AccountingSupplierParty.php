<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use DOMDocument;
use DOMElement;

use Projom\Peppol\BIS3\Segment\SegmentInterface;

class AccountingSupplierParty implements SegmentInterface
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
