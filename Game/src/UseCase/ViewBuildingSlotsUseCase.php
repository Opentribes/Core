<?php

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Message\ViewBuildingSlotsMessageInterface;

final class ViewBuildingSlotsUseCase
{

    public function __construct()
    {
    }

    public function execute(ViewBuildingSlotsMessageInterface $message):void
    {
        $slots = [];

        for($slotCounter = 0;$slotCounter < $message->getMaximumSlotNumber();$slotCounter++)
        {
            $slotView = new SlotView();
            $message->addSlot($slotView);
        }
    }
}