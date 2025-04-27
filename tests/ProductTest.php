<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\Product;
use src\application\usecases\ProductUseCase;
use src\application\entities\errors\ProductException;
use src\infrastructure\database\repositories\inMemory\InMemoryProductRepository;

class ProductTest extends TestCase
{
    private InMemoryProductRepository $repository;
    private ProductUseCase $productUseCase;
    private Product $product;

    protected function setUp(): void
    {
        $this->product = new Product(
            "PRD001",
            "7891234567890",
            "Cadeira Gamer",
            "UN",
            true,
            new DateTimeImmutable(),
            1
        );
        $this->repository = new InMemoryProductRepository;
        $this->productUseCase = new ProductUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->product);
        unset($this->repository);
        unset($this->productUseCase);
    }

    public function testItShouldBeAbleToCreateaProduct()
    {
        $this->productUseCase->create($this->product);

        $findByProduct = $this->repository->findById($this->product->getId());

        $this->assertNotNull($findByProduct);
        $this->assertSame($this->product->getId(), $findByProduct->getId());
    }

    public function testItShouldReturnNullIfProductDoesNotExist()
    {
        $nonExistentProductId = 9999;

        $findByProduct = $this->repository->findById($nonExistentProductId);

        $this->assertNull($findByProduct);
    }

    public function testItShouldNotBeAbleToRegisteraProductWithTheSameBarcode()
    {
        $this->expectException(ProductException::class);

        $this->productUseCase->create($this->product);
        $this->productUseCase->create($this->product);
    }

    public function testItShouldBeAbleToListAllProducts()
    {
        $product1 = new Product("PRD002", "7894561237890", "Mesa de Escritório", "UN", true, new DateTimeImmutable(), 2);
        $product2 = new Product("PRD003", "1237894561230", "Monitor Full HD", "UN", true, new DateTimeImmutable(), 3);

        $this->productUseCase->create($product1);
        $this->productUseCase->create($product2);

        $products = $this->productUseCase->findManyProducts();

        $this->assertCount(2, $products);
        $this->assertEquals("7894561237890", $products[0]->getBarcode());
        $this->assertEquals("1237894561230", $products[1]->getBarcode());
    }

    public function testItShouldBeAbleToUpdateaProduct()
    {
        $this->productUseCase->create($this->product);

        $updateProduct = new Product("PRD002", "7894561237890", "Nome do produto alterado", "UN", true, new DateTimeImmutable(), 1);

        $this->productUseCase->update($updateProduct);

        $this->assertEquals("Nome do produto alterado", $updateProduct->getName());
    }
}
