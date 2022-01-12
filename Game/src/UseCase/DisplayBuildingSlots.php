<?php

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Message\DisplayBuildingSlotsMessage;
use OpenTribes\Core\Repository\BuildingRepository;
use OpenTribes\Core\View\SlotView;

final class DisplayBuildingSlots
{
    public function __construct(private BuildingRepository $buildingRepository)
    {
    }

    public function execute(DisplayBuildingSlotsMessage $message): void
    {
        $buildingCollection = $this->buildingRepository->findAllAtLocation(
            $message->getLocationX(),
            $message->getLocationY()
        );
        for ($slotCounter = 0; $slotCounter < $message->getMaximumSlotNumber(); $slotCounter++) {
            $slotView = new SlotView();
            $building = $buildingCollection->fromSlot($slotCounter);
            if ($building) {
                $slotView->setBuilding($building);
            }
            $message->addSlot($slotView);
        }
    }
}