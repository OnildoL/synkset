<?php

namespace src\application\interfaces;

use src\application\entities\Product;

interface ProductInterface
{
    public function create(Product $product): Product;
    public function findById(int $id): Product|null;
    public function findByBarcode(string $barcode): Product|null;
    public function findManyProducts(): array;
    public function update(Product $product): Product;
}
