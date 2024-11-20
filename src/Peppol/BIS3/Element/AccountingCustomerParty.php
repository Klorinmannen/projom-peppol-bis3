<?php

declare(strict_types=1);

namespace Projom\Peppol\BIS3\Segment;

use Projom\Peppol\BIS3\Document\DOM;
use Projom\Peppol\BIS3\Element\ELementInterface;
use Projom\Peppol\BIS3\Document\Element;

class AccountingCustomerParty implements ELementInterface
{
	private array $data = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public static function create(array $data): AccountingCustomerParty
	{
		return new AccountingCustomerParty($data);
	}

	public function build(DOM $document): Element
	{
		$party = $document->newElement('cac:Party');
		$party->appendNewChild('cbc:EndpointID', $this->data['endpoint_id'], ['schemeID' => $this->data['scheme_id']]);

		$postalAddress = $document->newElement('cac:PostalAddress');
		$postalAddress->appendNewChild('cbc:StreetName', $this->data['street_name']);
		$postalAddress->appendNewChild('cbc:AdditionalStreetName', $this->data['additional_street_name']);
		$postalAddress->appendNewChild('cbc:CityName', $this->data['city_name']);
		$postalAddress->appendNewChild('cbc:PostalZone', $this->data['postal_zone']);

		$addressLine = $document->newElement('cac:AddressLine');
		$addressLine->appendNewChild('cbc:Line', $this->data['line']);
		$postalAddress->appendChild($addressLine);

		$country = $document->newElement('cac:Country');
		$country->appendNewChild('cbc:IdentificationCode', $this->data['identification_code']);
		$postalAddress->appendChild($country);
		$party->appendChild($postalAddress);

		$legalEntity = $document->newElement('cac:PartyLegalEntity');
		$legalEntity->appendNewChild('cbc:RegistrationName', $this->data['registration_name']);
		$legalEntity->appendNewChild('cbc:CompanyID', $this->data['company_id'], ['schemeID' => $this->data['scheme_id']]);
		$party->appendChild($legalEntity);

		$customerParty = $document->newElement('cac:AccountingCustomerParty');
		$customerParty->appendChild($party);
		return $customerParty;
	}

	public function validate(): array
	{
		return [];
	}
}
