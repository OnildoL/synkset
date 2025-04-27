<?php

namespace src\application\entities;

use DateTimeImmutable;

class IncomingInvoice
{
    private int $companyId;
    private int $supplierId;
    private string $nf;
    private string $serie;
    private string $protocol;
    private string $accessKey;
    private DateTimeImmutable $issueDate;
    private DateTimeImmutable $receiptDate;
    private int $totalValueProductInCent;
    private int $totalValueNoteInCent;
    private int $totalValueDiscountInCent;
    private string $hangtag;
    private string $status;
    private bool $symbolic;
    private string $observation;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;
    private int $id;

    public function __construct(
        int $companyId,
        int $supplierId,
        string $nf,
        string $serie,
        string $protocol,
        string $accessKey,
        DateTimeImmutable $issueDate,
        DateTimeImmutable $receiptDate,
        int $totalValueProductInCent,
        int $totalValueNoteInCent,
        int $totalValueDiscountInCent,
        string $hangtag,
        string $status,
        bool $symbolic,
        string $observation,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        ?int $id = null
    ) {
        $this->setCompanyId($companyId);
        $this->setSupplierId($supplierId);
        $this->setNf($nf);
        $this->setSerie($serie);
        $this->setProtocol($protocol);
        $this->setAccessKey($accessKey);
        $this->setIssueDate($issueDate);
        $this->setReceiptDate($receiptDate);
        $this->setTotalValueProductsInCent($totalValueProductInCent);
        $this->setTotalValueNoteInCent($totalValueNoteInCent);
        $this->setTotalValueDiscountInCent($totalValueDiscountInCent);
        $this->setHangtag($hangtag);
        $this->setStatus($status);
        $this->setSymbolic($symbolic);
        $this->setObservation($observation);
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function getNf(): string
    {
        return $this->nf;
    }

    public function getSerie(): string
    {
        return $this->serie;
    }

    public function getProtocol(): string
    {
        return $this->protocol;
    }

    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    public function getIssueDate(): DateTimeImmutable
    {
        return $this->issueDate;
    }

    public function getReceiptDate(): DateTimeImmutable
    {
        return $this->receiptDate;
    }

    public function getTotalValueProductInCent(): int
    {
        return $this->totalValueProductInCent;
    }

    public function getTotalValueNoteInCent(): int
    {
        return $this->totalValueNoteInCent;
    }

    public function getTotalValueDiscountInCent(): int
    {
        return $this->totalValueDiscountInCent;
    }

    public function getHangtag(): string
    {
        return $this->hangtag;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isSymbolic(): bool
    {
        return $this->symbolic;
    }

    public function getObservation(): string
    {
        return $this->observation;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function setNf(string $nf): void
    {
        $this->nf = $nf;
    }

    public function setSerie(string $serie): void
    {
        $this->serie = $serie;
    }

    public function setProtocol(string $protocol): void
    {
        $this->protocol = $protocol;
    }

    public function setAccessKey(string $accessKey): void
    {
        $this->accessKey = $accessKey;
    }

    public function setIssueDate(DateTimeImmutable $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    public function setReceiptDate(DateTimeImmutable $receiptDate): void
    {
        $this->receiptDate = $receiptDate;
    }

    public function setTotalValueProductsInCent(int $totalValueProductsInCent): void
    {
        $this->totalValueProductInCent = $totalValueProductsInCent;
    }

    public function setTotalValueNoteInCent(int $totalValueNoteInCent): void
    {
        $this->totalValueNoteInCent = $totalValueNoteInCent;
    }

    public function setTotalValueDiscountInCent(int $totalValueDiscountInCent): void
    {
        $this->totalValueDiscountInCent = $totalValueDiscountInCent;
    }

    public function setHangtag(string $hangtag): void
    {
        $this->hangtag = $hangtag;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setSymbolic(bool $symbolic): void
    {
        $this->symbolic = $symbolic;
    }

    public function setObservation(string $observation): void
    {
        $this->observation = $observation;
    }
}