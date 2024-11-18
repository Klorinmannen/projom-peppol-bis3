<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use DOMDocument;
use DOMElement;

use Projom\Peppol\BIS3\Segment\SegmentInterface;

class AccountingCustomerParty implements SegmentInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): AccountingCustomerParty
	{
		return new AccountingCustomerParty($data);
	}

	public function build(DOMDocument $document): DOMElement
	{
		$customerParty = $document->createElement('cac:AccountingCustomerParty');
		return $customerParty;
	}

	public function validate(): array
	{
		return [];
	}
}
