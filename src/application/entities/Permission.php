<?php

namespace src\application\entities;

class Permission
{
    private string $name;
    private string $description;
    private int $id;

    public function __construct(string $name, string $description, ?int $id = null)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
