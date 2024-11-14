<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use Stringable;

class Document implements Stringable
{
	private array $data = [];
	private array $segments = [];
	private array $errors = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): Document
	{
		return new Document($data);
	}

	public function validate(): void
	{
		// Validate the data, stupidity check.
	}

	public function build(): void
	{
		// Build the segments from the data.
	}

	public function toJSON(): string
	{
		return '';
	}

	public function toXML(): string
	{
		return '';
	}

	public function __toString(): string
	{
		return '';
	}
}
