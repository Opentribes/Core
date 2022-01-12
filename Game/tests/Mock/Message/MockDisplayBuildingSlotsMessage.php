<?php

namespace OpenTribes\Core\Tests\Mock\Message;


use OpenTribes\Core\Message\DisplayBuildingSlotsMessage;
use OpenTribes\Core\View\SlotView;

class MockDisplayBuildingSlotsMessage implements DisplayBuildingSlotsMessage
{
    private array $slotViews = [];

    public function __construct(
        private int $maximumSlotNumber = 0,
        private int $locationX = 0,
        private int $locationY = 0
    ) {
    }

    public function getSlots(): array
    {
        return $this->slotViews;
    }

    /**
     * @return int
     */
    public function getLocationX(): int
    {
        return $this->locationX;
    }

    /**
     * @return int
     */
    public function getLocationY(): int
    {
        return $this->locationY;
    }


    public function getMaximumSlotNumber(): int
    {
        return $this->maximumSlotNumber;
    }

    public function addSlot(SlotView $slotView): void
    {
        $this->slotViews[] = $slotView;
    }
}