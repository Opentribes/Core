<?php

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\ViewBuildingSlotsMessageInterface;
use OpenTribes\Core\UseCase\SlotView;

class MockViewBuildingSlotsMessage implements ViewBuildingSlotsMessageInterface
{
    private array $slotViews = [];
    private int $maximumSlotNumber = 0;

    public function getSlots(): array
    {
        return $this->slotViews;
    }


    /**
     * @param int $maximumSlotNumber
     */
    public function __construct(int $maximumSlotNumber = 0)
    {
        $this->maximumSlotNumber = $maximumSlotNumber;
    }

    public function getMaximumSlotNumber(): int
    {
       return $this->maximumSlotNumber;
    }

    public function addSlot(SlotView $slotView): void
    {
        $this->slotViews[]=$slotView;
    }
}