<?php

declare(strict_types=1);

namespace Projom\Peppol;

use Projom\Peppol\BIS3\Document;
use Projom\Peppol\BIS3\Rules;

class BIS3
{
	public static function create(array $data): string
	{
		Rules::validate($data);
		$document = new Document($data);
		return (string) $document;
	}

	public static function createAndWriteXML(array $data, string $filename): void
	{
		$document = new Document($data);
		file_put_contents($filename, $document->toXML());
	}

	public static function asJSON(array $data): string
	{
		$document = new Document($data);
		return $document->toJSON();
	}

	public static function asXML(array $data): string
	{
		$document = new Document($data);
		return $document->toXML();
	}
}
