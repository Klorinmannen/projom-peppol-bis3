<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use DOMDocument;

/**
 * Base class for all BIS3 documents.
 */
abstract class Document
{
	protected array $data = [];
	protected array $segments = [];
	protected array $errors = [];
	protected null|DOMDocument $document = null;

	abstract public static function create(array $data): Document;
	abstract public function build(): void;
	abstract public function validate(): void;

	public function XML(): string
	{
		return $this->document->saveXML();
	}

	public function saveXML(string $filename): void
	{
		$this->document->save($filename);
	}
}
