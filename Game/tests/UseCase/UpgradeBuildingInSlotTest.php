<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Factory\BuildingFactory;
use OpenTribes\Core\Tests\Mock\Message\MockUpgradeBuildingInSlotMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockBuildingRepository;
use OpenTribes\Core\UseCase\UpgradeBuildingInSlot;
use PHPUnit\Framework\TestCase;

final class UpgradeBuildingInSlotTest extends TestCase
{
    public function testCanUpgradeBuildingOnSlot(): void
    {
        $lumberjack = new Building('lumberjack');
        $lumberjack->setSlot('1');
        $buildingRepository = new MockBuildingRepository([$lumberjack]);

        $message = new MockUpgradeBuildingInSlotMessage();
        $factory = new BuildingFactory();
        $useCase = new UpgradeBuildingInSlot($buildingRepository,$factory);
        $useCase->execute($message);
        $this->assertNotEmpty($message->getBuilding());
        $this->assertSame(1, $message->getBuilding()->level);
    }

    public function testCanCreateNewBuildingOnSlot(): void
    {

        $buildingRepository = new MockBuildingRepository();
        $factory = new BuildingFactory();
        $message = new MockUpgradeBuildingInSlotMessage('lumberjack');
        $useCase = new UpgradeBuildingInSlot($buildingRepository,$factory);
        $useCase->execute($message);
        $this->assertNotEmpty($message->getBuilding());
        $this->assertSame(1, $message->getBuilding()->level);
    }

    public function testCanStoreUpgradedBuilding(): void
    {
        $buildingRepository = new MockBuildingRepository();
        $factory = new BuildingFactory();
        $message = new MockUpgradeBuildingInSlotMessage('lumberjack');
        $useCase = new UpgradeBuildingInSlot($buildingRepository,$factory);
        $useCase->execute($message);
        $this->assertNotEmpty($buildingRepository->findAllAtLocation(1,1)->fromSlot('1'));
    }
}
