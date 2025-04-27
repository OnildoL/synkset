<?php

namespace src\application\usecases;

use src\application\entities\Product;
use src\application\interfaces\ProductInterface;
use src\application\entities\errors\ProductException;

class ProductUseCase
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function create(Product $product): Product
    {
        $productExist = $this->productInterface->findByBarcode($product->getBarcode());

        if ($productExist) {
            throw new ProductException("Já existe produto registrado com esse código de barras.");
        }

        $result = $this->productInterface->create($product);

        return $result;
    }

    public function findManyProducts(): array
    {
        return $this->productInterface->findManyProducts();
    }

    public function update(Product $product): Product
    {
        $productExist = $this->productInterface->findById($product->getId());

        if (!$productExist) {
            throw new ProductException("Produto não encontrado.");
        }

        return $this->productInterface->update($product);
    }
}
