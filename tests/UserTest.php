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
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User(
            "João",
            "João de sousa",
            "email@email.com",
            "123",
            true,
            new DateTimeImmutable(),
            new DateTimeImmutable(),
            1
        );
        $this->repository = new InMemoryUserRepository;
        $this->userUseCase = new UserUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->user);
        unset($this->repository);
        unset($this->userUseCase);
    }

    public function testItShouldBeAbleToCreateaUser()
    {
        $this->userUseCase->create($this->user);

        $findByUser = $this->repository->findById($this->user->getId());

        $this->assertNotNull($findByUser);
        $this->assertSame($this->user->getId(), $findByUser->getId());
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

        $this->userUseCase->create($this->user);
        $this->userUseCase->create($this->user);
    }
}
