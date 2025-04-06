<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\User;
use src\application\usecases\UserUseCase;
use src\application\entities\errors\UserException;
use src\infrastructure\database\repositories\inMemory\InMemoryUserRepository;

class UserTest extends TestCase
{
    private InMemoryUserRepository $repository;
    private UserUseCase $userUseCase;

    protected function setUp(): void
    {
        $this->repository = new InMemoryUserRepository;
        $this->userUseCase = new UserUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->userUseCase);
    }

    public function testItShouldBeAbleToCreateaUser()
    {
        $user = new User(
            "João",
            "João de sousa",
            "email@email.com",
            "123",
            true,
            new DateTimeImmutable(),
            new DateTimeImmutable(),
            1
        );

        $this->userUseCase->create($user);

        $findByUser = $this->repository->findById($user->getId());

        $this->assertNotNull($findByUser);
        $this->assertSame($user->getId(), $findByUser->getId());
    }

    public function testItShouldReturnNullIfUserDoesNotExist()
    {
        $nonExistentUserId = 9999;

        $findByUser = $this->repository->findById($nonExistentUserId);

        $this->assertNull($findByUser);
    }

    public function testItShouldNotBeAbleToRegisteraUserWithTheSameUsername()
    {
        $this->expectException(UserException::class);

        $user = new User(
            "João",
            "João de sousa",
            "email@email.com",
            "123",
            true,
            new DateTimeImmutable(),
            new DateTimeImmutable(),
            1
        );

        $this->userUseCase->create($user);
        $this->userUseCase->create($user);
    }
}
