<?php

namespace tests\sers\onild\www\web\projects\synkset\tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\errors\UserException;
use src\application\entities\User;
use src\infrastructure\database\repositories\inMemory\InMemoryUserRepository;

class UserTest extends TestCase
{
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

        $repository = new InMemoryUserRepository;

        $repository->create($user);

        $findByUser = $repository->findById($user->getId());

        $this->assertNotNull($findByUser);
        $this->assertSame($user->getId(), $findByUser->getId());
    }

    public function testItShouldReturnNullIfUserDoesNotExist()
    {
        $nonExistentUserId = 9999;

        $repository = new InMemoryUserRepository;

        $findByUser = $repository->findById($nonExistentUserId);

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

        $repository = new InMemoryUserRepository;

        $repository->create($user);
        $repository->create($user);
    }
}
