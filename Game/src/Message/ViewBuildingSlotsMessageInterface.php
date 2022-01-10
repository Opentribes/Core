<?php

namespace OpenTribes\Core\Message;

use OpenTribes\Core\UseCase\SlotView;

interface ViewBuildingSlotsMessageInterface
{
public function getSlots():array;

    public function getMaximumSlotNumber():int;
    public function addSlot(SlotView  $slotView):void;
}