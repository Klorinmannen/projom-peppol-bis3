<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use DOMDocument;
use DOMElement;

interface SegmentInterface
{
	public static function create(array $data): SegmentInterface;
	public function build(DOMDocument $document): DOMElement;
	public function validate(): array;
}
