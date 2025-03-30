<?php

namespace src\application\entities;

use DateTimeImmutable;

class User
{
    private int|string $username;
    private string $name;
    private string $hashedPassword;
    private string $email;
    private bool $isActive;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;
    private int $id;

    public function __construct(
        int|string $username,
        string $name,
        string $hashedPassword,
        string $email,
        bool $isActive,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        ?int $id = null,
    ) {
        $this->setUsername($username);
        $this->setName($name);
        $this->setEmail($email);
        $this->setHashedPassword($hashedPassword);
        $this->setIsActive($isActive);
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUsername(int|string $username): void
    {
        $this->username = $username;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setHashedPassword(string $hashedPassword): void
    {
        $this->hashedPassword = $hashedPassword;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    private function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}
