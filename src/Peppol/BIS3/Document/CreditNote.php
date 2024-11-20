<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document;

use Projom\Peppol\BIS3\Document\Document;
use Projom\Peppol\BIS3\Document\DOM;

class CreditNote extends Document
{
	public function __construct(array $data)
	{
		$this->data = $data;
		$this->document = new DOM();
	}

	public static function create(array $data): CreditNote
	{
		return new CreditNote($data);
	}

	public function build(): void {}

	public function validate(): void {}

	public function processData(): void { }
}
