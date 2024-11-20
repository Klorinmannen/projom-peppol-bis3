<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document;

use Projom\Peppol\BIS3\Document\DOM;

/**
 * Base class for all BIS3 documents.
 */
abstract class Document
{
	protected array $segments = [];
	protected array $errors = [];
	protected null|DOM $document = null;

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
