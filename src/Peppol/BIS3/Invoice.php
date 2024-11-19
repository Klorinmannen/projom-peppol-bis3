<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3;

use DOMDocument;

use Projom\Peppol\BIS3\Document;

class Invoice extends Document
{
	private const ELEMENTS = [
		'customization_id' => ['required' => true, 'default' => 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0'],
		'profile_id' => ['required' => true, 'default' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0'],
		'invoice_number' => ['required' => true],
		'issue_date' => ['required' => true, 'format' => 'YYYY-MM-DD'],
		'due_date' => ['required' => false, 'format' => 'YYYY-MM-DD'],
		'tax_date' => ['required' => false, 'format' => 'YYYY-MM-DD'],
		'type_code' => ['required' => true, 'default' => '380'],
		'note' => ['required' => false],
		'currency_code' => ['required' => true, 'default' => 'SEK'],
		'buyer_reference' => ['required' => false],
		'invoice_period' => ['required' => false],
		'supplier_party' => ['required' => true],
		'customer_party' => ['required' => true],
		'delivery' => ['required' => false],
		'total_tax_amount' => ['required' => true],
		'line_sum_amount' => ['required' => true],
		'amount_exlcuding_tax' => ['required' => true],
		'amount_including_tax' => ['required' => true],
		'total_allowance_amount' => ['required' => false],
		'total_charge_amount' => ['required' => false],
		'prepaid_amount' => ['required' => false],
		'rounding_amount' => ['required' => false],
		'amount_due' => ['required' => true],
		'lines' => ['required' => true]
	];

	public function __construct(array $data)
	{
		$this->data = $data;
		$this->document = new DOMDocument('1.0', 'UTF-8');
	}

	public static function create(array $data): Invoice
	{
		return new Invoice($data);
	}

	public function build(): void {}

	public function validate(): void {}
}
