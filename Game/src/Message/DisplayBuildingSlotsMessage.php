<?php

namespace OpenTribes\Core\Message;

use OpenTribes\Core\View\SlotView;

interface DisplayBuildingSlotsMessage
{
    public function getSlots(): array;

    public function getMaximumSlotNumber(): int;

    public function addSlot(SlotView $slotView): void;

    public function getLocationX(): int;

    public function getLocationY(): int;

}