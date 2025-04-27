<?php

namespace src\application\entities;

use DateTimeImmutable;

class Supplier
{
    private string $corporateName;
    private string $tradeName;
    private string $cnpj;
    private string $stateRegistration;
    private string $municipalRegistration;
    private string $email;
    private string $cellPhone;
    private string $address;
    private string $addressNumber;
    private string $complement;
    private string $neighborhood;
    private string $city;
    private string $state;
    private string $zipCode;
    private bool $isActive;
    private DateTimeImmutable $createdAt;
    private int $id;

    public function __construct(
        string $corporateName,
        string $tradeName,
        string $cnpj,
        string $stateRegistration,
        string $municipalRegistration,
        string $email,
        string $cellPhone,
        string $address,
        string $addressNumber,
        string $complement,
        string $neighborhood,
        string $city,
        string $state,
        string $zipCode,
        bool $isActive,
        DateTimeImmutable $createdAt,
        ?int $id = null
    ) {
        $this->setCorporateName($corporateName);
        $this->setTradeName($tradeName);
        $this->setCnpj($cnpj);
        $this->setStateRegistration($stateRegistration);
        $this->setMunicipalRegistration($municipalRegistration);
        $this->setEmail($email);
        $this->setCellPhone($cellPhone);
        $this->setAddress($address);
        $this->setAddressNumber($addressNumber);
        $this->setComplement($complement);
        $this->setNeighborhood($neighborhood);
        $this->setCity($city);
        $this->setState($state);
        $this->setZipCode($zipCode);
        $this->setIsActive($isActive);
        $this->createdAt = $createdAt;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCorporateName(): string
    {
        return $this->corporateName;
    }

    public function getTradeName(): string
    {
        return $this->tradeName;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function getStateRegistration(): string
    {
        return $this->stateRegistration;
    }

    public function getMunicipalRegistration(): string
    {
        return $this->municipalRegistration;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCellPhone(): string
    {
        return $this->cellPhone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getAddressNumber(): string
    {
        return $this->addressNumber;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCorporateName(string $corporateName): void
    {
        $this->corporateName = $corporateName;
    }

    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function setStateRegistration(string $stateRegistration): void
    {
        $this->stateRegistration = $stateRegistration;
    }

    public function setMunicipalRegistration(string $municipalRegistration): void
    {
        $this->municipalRegistration = $municipalRegistration;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setCellPhone(string $cellPhone): void
    {
        $this->cellPhone = $cellPhone;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setAddressNumber(string $addressNumber): void
    {
        $this->addressNumber = $addressNumber;
    }

    public function setComplement(string $complement): void
    {
        $this->complement = $complement;
    }

    public function setNeighborhood(string $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}