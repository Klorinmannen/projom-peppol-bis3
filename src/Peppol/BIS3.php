<?php

declare(strict_types=1);

namespace Projom\Peppol;

use Projom\Peppol\BIS3\Document\CreditNote;
use Projom\Peppol\BIS3\Document\Invoice;

class BIS3
{
	public static function invoice(array $data): string
	{
		$invoice = Invoice::create($data);
		return $invoice->XML();
	}

	public static function creditNote(array $data): string
	{
		$creditNote = CreditNote::create($data);
		return $creditNote->XML();
	}
}
