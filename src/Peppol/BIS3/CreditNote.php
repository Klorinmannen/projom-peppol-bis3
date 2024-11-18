<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use DOMDocument;

use Projom\Peppol\BIS3\Document;

class CreditNote extends Document
{
	public function __construct(array $data)
	{
		$this->data = $data;
		$this->document = new DOMDocument('1.0', 'UTF-8');
	}

	public static function create(array $data): CreditNote
	{
		return new CreditNote($data);
	}

	public function build(): void {}

	public function validate(): void {}
}
