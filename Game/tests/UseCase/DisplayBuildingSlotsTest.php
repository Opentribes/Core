<?php

namespace OpenTribes\Core\Tests\UseCase;


use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Tests\Mock\Message\MockDisplayBuildingSlotsMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockBuildingRepository;
use OpenTribes\Core\UseCase\DisplayBuildingSlots;
use OpenTribes\Core\View\BuildingView;
use OpenTribes\Core\View\SlotView;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \OpenTribes\Core\UseCase\DisplayBuildingSlots
 */
final class DisplayBuildingSlotsTest extends TestCase
{

    public function testSlotsAreNotExisting(): void
    {
        $buildingRepository = new MockBuildingRepository();

        $message = new MockDisplayBuildingSlotsMessage();

        $useCase = new DisplayBuildingSlots($buildingRepository);
        $useCase->execute($message);

        $this->assertEmpty($message->getSlots());
    }


    public function testCanViewSlots(): void
    {
        $buildingRepository = new MockBuildingRepository();

        $message = new MockDisplayBuildingSlotsMessage(2);

        $useCase = new DisplayBuildingSlots($buildingRepository);
        $useCase->execute($message);

        $this->assertNotEmpty($message->getSlots());
        $this->assertCount(2, $message->getSlots());
    }

    public function testCanViewSlotsWithBuilding(): void
    {
        $building = new Building("Test");
        $building->setSlotNumber(0);
        $buildingRepository = new MockBuildingRepository([$building]);

        $message = new MockDisplayBuildingSlotsMessage(2);

        $useCase = new DisplayBuildingSlots($buildingRepository);
        $useCase->execute($message);
        /** @var SlotView $firstSlot */
        $firstSlot = $message->getSlots()->first();
        $this->assertInstanceOf(BuildingView::class,$firstSlot->building);
    }

}
