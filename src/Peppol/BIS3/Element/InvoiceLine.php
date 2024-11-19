<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Element;

use DOMDocument;
use DOMElement;

use Projom\Peppol\BIS3\Segment\ELementInterface;

class InvoiceLine implements ElementInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;	
	}

	public static function create(array $data): ELementInterface 
	{ 
		return new InvoiceLine($data);
	}

	public function build(DOMDocument $document): DOMElement 
	{ 
		$invoiceLine = $document->createElement('cac:InvoiceLine');
		return $invoiceLine;
	}

	public function validate(): array 
	{ 
		return [];
	}
}