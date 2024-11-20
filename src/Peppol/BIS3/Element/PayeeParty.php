<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use Projom\Peppol\BIS3\Document\DOM;
use Projom\Peppol\BIS3\Document\Element;
use Projom\Peppol\BIS3\Element\ELementInterface;

class PayeeParty implements ELementInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): PayeeParty
	{
		return new PayeeParty($data);
	}

	public function build(DOM $document): Element
	{
		$payeeParty = $document->createElement('cac:PayeeParty');
		return $payeeParty;
	}

	public function validate(): array
	{
		return [];
	}
}
