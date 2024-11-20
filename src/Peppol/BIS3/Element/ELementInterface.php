<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Element;

use Projom\Peppol\BIS3\Document\DOM;
use Projom\Peppol\BIS3\Document\Element;

interface ELementInterface
{
	public static function create(array $data): ELementInterface;
	public function build(DOM $document): Element;
	public function validate(): array;
}
