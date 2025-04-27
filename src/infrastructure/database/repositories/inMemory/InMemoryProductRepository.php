<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Product;
use src\application\interfaces\ProductInterface;

class InMemoryProductRepository implements ProductInterface
{
    private array $products = [];

    public function create(Product $product): Product
    {
        $this->products[$product->getId()] = $product;

        return $product;
    }

    public function findById(int $id): Product|null
    {
        return $this->products[$id] ?? null;
    }

    public function findByBarcode(string $barcode): Product|null
    {
        foreach ($this->products as $product) {
            if ($product->getBarcode() === $barcode) {
                return $product;
            }
        }
        return null;
    }

    public function findManyProducts(): array
    {
        return array_values($this->products) ?? [];
    }

    public function update(Product $product): Product
    {
        $this->products[$product->getId()] = $product;

        return $product;
    }
}
