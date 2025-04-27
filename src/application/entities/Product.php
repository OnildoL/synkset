<?php

namespace src\application\entities;

use DateTimeImmutable;

class Product
{
    private string $code;
    private string $barcode;
    private string $name;
    private string $unitOfMeasure;
    private bool $isActive;
    private DateTimeImmutable $createdAt;
    private int $id;

    public function __construct(
        string $code,
        string $barcode,
        string $name,
        string $unitOfMeasure,
        bool $isActive,
        DateTimeImmutable $createdAt,
        ?int $id = null
    ) {
        $this->setCode($code);
        $this->setBarcode($barcode);
        $this->setName($name);
        $this->setUnitOfMeasure($unitOfMeasure);
        $this->setIsActive($isActive);
        $this->createdAt = $createdAt;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getBarcode(): string
    {
        return $this->barcode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setBarcode(string $barcode): void
    {
        $this->barcode = $barcode;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setUnitOfMeasure(string $unitOfMeasure): void
    {
        $this->unitOfMeasure = $unitOfMeasure;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}