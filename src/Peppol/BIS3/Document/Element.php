<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document;

use DOMElement;

class Element extends DOMElement
{
	public function __construct(string $name, null|int|float|string $value)
	{
		parent::__construct($name, (string) $value);
	}

	public function appendNewChild(string $name, null|int|float|string $value = null, array $attributes = []): void
	{
		$element = new DOMElement($name, (string) $value);

		foreach ($attributes as $name => $value)
			$element->setAttribute($name, (string) $value);

		$this->appendChild($element);
	}
}
