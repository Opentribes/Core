<?php

namespace OpenTribes\Core\Tests;


use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Tests\Mock\Message\MockDisplayBuildingSlotsMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockBuildingRepository;
use OpenTribes\Core\UseCase\DisplayBuildingSlots;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \OpenTribes\Core\UseCase\DisplayBuildingSlots
 */
final class ViewBuildingSlotsUseCaseTest extends TestCase
{

    public function testSlotsAreNotExisting(): void
    {
        $buildingRepository = new MockBuildingRepository();
        $useCase = new DisplayBuildingSlots($buildingRepository);
        $message = new MockDisplayBuildingSlotsMessage();
        $useCase->execute($message);

        $this->assertEmpty($message->getSlots());
    }


    public function testCanViewSlots(): void
    {
        $buildingRepository = new MockBuildingRepository();
        $useCase = new DisplayBuildingSlots($buildingRepository);
        $message = new MockDisplayBuildingSlotsMessage(2);
        $useCase->execute($message);

        $this->assertNotEmpty($message->getSlots());
        $this->assertCount(2, $message->getSlots());
    }

    public function testCanViewSlotsWithBuilding(): void
    {
        $building = new Building(0);

        $buildingRepository = new MockBuildingRepository([$building]);

        $useCase = new DisplayBuildingSlots($buildingRepository);
        $message = new MockDisplayBuildingSlotsMessage(2);
        $useCase->execute($message);

        $this->assertNotEmpty($message->getSlots());
        $this->assertCount(2, $message->getSlots());
        $firstSlot = $message->getSlots()[0];
        $this->assertNotEmpty($firstSlot->getBuilding());
    }



}
