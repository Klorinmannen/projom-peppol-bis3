<?php

declare(strict_types=1);

namespace Projom\Peppol;

use Projom\Peppol\BIS3\Document;

class BIS3
{
	public static function create(array $data): string
	{
		$document = new Document($data);
		return (string) $document;
	}
}
