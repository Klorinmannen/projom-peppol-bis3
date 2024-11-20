<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document;

use DOMDocument;

use Projom\Peppol\BIS3\Document\Element;

class DOM extends DOMDocument
{
	public function __construct()
	{
		parent::__construct('1.0', 'UTF-8');
	}

	public function newElement(string $localName, null|int|float|string $value = '', array $attributes = [])
	{
		$element = new Element($localName, $value);

		foreach ($attributes as $name => $value)
			$element->setAttribute($name, (string) $value);

		return $element;
	}
}
