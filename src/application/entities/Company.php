<?php

namespace src\application\entities;

use DateTimeImmutable;

class Company
{
    private string $name;
    private bool $isActive;
    private string $cnpj;
    private string $address;
    private string $addressNumber;
    private string $complement;
    private string $neighborhood;
    private string $city;
    private string $state;
    private int $zipCode;
    private int $telephone;
    private int $cellPhone;
    private DateTimeImmutable $createdAt;
    private int $id;

    public function __construct(
        string $name,
        bool $isActive,
        string $cnpj,
        string $address,
        string $addressNumber,
        string $complement,
        string $neighborhood,
        string $city,
        string $state,
        int $zipCode,
        int $telephone,
        int $cellPhone,
        DateTimeImmutable $createdAt,
        ?int $id = null
    ) {
        $this->setName($name);
        $this->setIsActive($isActive);
        $this->setCnpj($cnpj);
        $this->setAddress($address);
        $this->setAddressNumber($addressNumber);
        $this->setComplement($complement);
        $this->setNeighborhood($neighborhood);
        $this->setCity($city);
        $this->setState($state);
        $this->setZipCode($zipCode);
        $this->setTelephone($telephone);
        $this->setCellPhone($cellPhone);
        $this->createdAt = $createdAt;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
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

    public function getZipCode(): int
    {
        return $this->zipCode;
    }

    public function getTelephone(): int
    {
        return $this->telephone;
    }

    public function getCellPhone(): int
    {
        return $this->cellPhone;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
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

    public function setZipCode(int $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    public function setTelephone(int $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setCellPhone(int $cellPhone): void
    {
        $this->cellPhone = $cellPhone;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
