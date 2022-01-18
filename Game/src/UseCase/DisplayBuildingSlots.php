<?php

declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Message\DisplayBuildingSlotsMessage;
use OpenTribes\Core\Repository\BuildingRepository;
use OpenTribes\Core\View\BuildingView;
use OpenTribes\Core\View\SlotView;

final class DisplayBuildingSlots
{
    public function __construct(private BuildingRepository $buildingRepository)
    {
    }

    public function execute(DisplayBuildingSlotsMessage $message): void
    {
        if (! $this->buildingRepository->userCanBuildAtLocation(
            $message->getLocationX(),
            $message->getLocationY(),
            $message->getUserName()
        )) {
            $message->enableCityDataOnly();
            return;
        }

        $this->fillSlots($message);
    }

    public function fillSlots(
        DisplayBuildingSlotsMessage $message,
    ): void {
        $buildingCollection = $this->buildingRepository->findAllAtLocation(
            $message->getLocationX(),
            $message->getLocationY()
        );
        $maxSlots = $message->getMaximumSlotNumber();
        for ($slotCounter = 0; $slotCounter < $maxSlots; $slotCounter++) {
            $slotView = new SlotView();
            $building = $buildingCollection->fromSlot((string) $slotCounter);
            if ($building) {
                $slotView->building = BuildingView::fromEntity($building);
            }
            $message->addSlot($slotView);
        }
    }
}
