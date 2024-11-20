<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Document\Invoice;

use Projom\Peppol\BIS3\Document\Invoice\Date;

class Config
{
	private const DEFAULT_CUSTOMIZATION_ID = 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0';
	private const DEFAULT_PROFILE_ID = 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0';
	private const DEFAULT_TYPE_CODE = '380';
	private const DEFAULT_CURRENCY_CODE = 'SEK';

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
		'seller' => ['required' => true],
		'buyer' => ['required' => true],
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

	public string $customizationId;
	public string $profileId;
	public string $invoiceNumber;
	public null|Date $issueDate;
	public null|Date $dueDate;
	public null|Date $taxDate;
	public string $typeCode;
	public null|string $note;
	public string $currencyCode;
	public null|string $buyerReference;
	public null|string $invoicePeriod;
	public array $seller;
	public array $buyer;
	public array $delivery;
	public Amount $totalTaxAmount;
	public Amount $lineSumAmount;
	public Amount $amountExcludingTax;
	public Amount $amountIncludingTax;
	public null|Amount $totalAllowanceAmount;
	public null|Amount $totalChargeAmount;
	public Amount $prepaidAmount;
	public Amount $roundingAmount;
	public Amount $amountDue;
	public array $lines;

	public function __construct(array $data)
	{
		$this->customizationId = $data['customization_id'] ?? static::DEFAULT_CUSTOMIZATION_ID;
		$this->profileId = $data['profile_id'] ?? static::DEFAULT_PROFILE_ID;
		$this->typeCode = $data['type_code'] ?? static::DEFAULT_TYPE_CODE;
		$this->currencyCode = $data['currency_code'] ?? static::DEFAULT_CURRENCY_CODE;

		$this->invoiceNumber = $data['invoice_number'] ?? '';
		$this->issueDate = new Date($data['issue_date'] ?? '');

		if (array_key_exists('due_date', $data))
			$this->dueDate = new Date($data['due_date']);

		if (array_key_exists('tax_date', $data))
			$this->taxDate = new Date($data['tax_date']);

		$this->note = $data['note'] ?? null;
		$this->buyerReference = $data['buyer_reference'] ?? null;
		$this->invoicePeriod = $data['invoice_period'] ?? null;

		$this->seller = $data['seller'] ?? [];
		$this->buyer = $data['buyer'] ?? [];
		$this->delivery = $data['delivery'] ?? [];

		$this->totalTaxAmount = new Amount($data['total_tax_amount'] ?? '0.00');
		$this->amountExcludingTax = new Amount($data['amount_excluding_tax'] ?? '0.00');
		$this->amountIncludingTax = new Amount($data['amount_including_tax'] ?? '0.00');

		if (array_key_exists('total_allowance_amount', $data))
			$this->totalAllowanceAmount = new Amount($data['total_allowance_amount']);
		else
			$this->totalAllowanceAmount = null;

		if (array_key_exists('total_charge_amount', $data))
			$this->totalChargeAmount = new Amount($data['total_charge_amount']);
		else
			$this->totalChargeAmount = null;

		$this->prepaidAmount = new Amount($data['prepaid_amount'] ?? '0.00');
		$this->roundingAmount = new Amount($data['rounding_amount'] ?? '0.00');
		$this->amountDue = new Amount($data['amount_due'] ?? '0.00');

		$this->lineSumAmount = new Amount($data['line_sum_amount'] ?? '0.00');
		$this->lines = $data['lines'] ?? [];
	}

	public function hasDueDate(): bool
	{
		return $this->dueDate !== null;
	}

	public function hasTaxDate(): bool
	{
		return $this->taxDate !== null;
	}

	public function hasNote(): bool
	{
		return $this->note !== null;
	}

	public function hasBuyerReference(): bool
	{
		return $this->buyerReference !== null;
	}

	public function hasInvoicePeriod(): bool
	{
		return $this->invoicePeriod !== null;
	}

	public function hasTotalAllowanceAmount(): bool
	{
		return $this->totalAllowanceAmount !== null;
	}

	public function hasTotalChargeAmount(): bool
	{
		return $this->totalChargeAmount !== null;
	}

	public function hasDelivery(): bool
	{
		return count($this->delivery) > 0;
	}
}
