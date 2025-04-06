<?php

namespace src\application\entities;

class Profile
{
    private string $name;
    private int $id;

    public function __construct(string $name, ?int $id = null)
    {
        $this->setName($name);
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
