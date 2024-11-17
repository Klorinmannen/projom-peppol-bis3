<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

interface SegmentInterface
{
	public static function create(array $data): SegmentInterface;
	public function build(): string;
	public function validate(): bool;
	public function __toString(): string;
}
