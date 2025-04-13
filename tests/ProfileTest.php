<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\application\entities\Profile;
use src\application\usecases\ProfileUseCase;
use src\application\entities\errors\ProfileException;
use src\infrastructure\database\repositories\inMemory\InMemoryProfileRepository;

class ProfileTest extends TestCase
{
    private InMemoryProfileRepository $repository;
    private ProfileUseCase $profileUseCase;
    private Profile $profile;

    protected function setUp(): void
    {
        $this->profile = new Profile("Administrador", 1);
        $this->repository = new InMemoryProfileRepository;
        $this->profileUseCase = new ProfileUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->profile);
        unset($this->repository);
        unset($this->profileUseCase);
    }

    public function testItShouldBeAbleToCreateaProfile()
    {
        $this->profileUseCase->create($this->profile);

        $findByProfile = $this->repository->findById($this->profile->getId());

        $this->assertNotNull($findByProfile);
        $this->assertSame($this->profile->getId(), $findByProfile->getId());
    }

    public function testItShouldReturnNullIfProfileDoesNotExist()
    {
        $nonExistentProfileId = 9999;

        $findByProfile = $this->repository->findById($nonExistentProfileId);

        $this->assertNull($findByProfile);
    }

    public function testItShouldNotBeAbleToRegisteraProfileWithTheSameProfilename()
    {
        $this->expectException(ProfileException::class);

        $this->profileUseCase->create($this->profile);
        $this->profileUseCase->create($this->profile);
    }

    public function testItShouldBeAbleToListAllProfiles()
    {
        $profile1 = new Profile("Administrador", 1);
        $profile2 = new Profile("Coordenador", 2);

        $this->profileUseCase->create($profile1);
        $this->profileUseCase->create($profile2);

        $profiles = $this->profileUseCase->findManyProfiles();

        $this->assertCount(2, $profiles);
        $this->assertEquals("Administrador", $profiles[0]->getName());
        $this->assertEquals("Coordenador", $profiles[1]->getName());
    }

    public function testItShouldBeAbleToUpdateaProfile()
    {
        $this->profileUseCase->create($this->profile);

        $updateProfile = new Profile("Coordenador", 1);

        $this->profileUseCase->update($updateProfile);

        $this->assertEquals("Coordenador", $updateProfile->getName());
    }
}
