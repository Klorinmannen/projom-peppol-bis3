<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use DOMDocument;
use DOMElement;

interface ELementInterface
{
	public static function create(array $data): ELementInterface;
	public function build(DOMDocument $document): DOMElement;
	public function validate(): array;
}
