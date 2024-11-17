<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use Projom\Peppol\BIS3\Segment\SegmentInterface;

class AccountingSupplierParty implements SegmentInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): AccountingSupplierParty
	{
		return new AccountingSupplierParty($data);
	}

	public function build(): string
	{
		return '';
	}

	public function validate(): bool
	{
		return true;
	}

	public function __toString(): string
	{
		return '';
	}
}
