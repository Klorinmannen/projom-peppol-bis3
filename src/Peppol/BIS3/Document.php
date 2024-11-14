<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use Stringable;

class Document implements Stringable
{
	private array $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function __toString(): string
	{
		return '';
	}
}