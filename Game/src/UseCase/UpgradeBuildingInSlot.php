<?php

declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Factory\BuildingFactory;
use OpenTribes\Core\Message\UpgradeBuildingInSlotMessage;
use OpenTribes\Core\Repository\BuildingRepository;
use OpenTribes\Core\View\BuildingView;

final class UpgradeBuildingInSlot
{
    public function __construct(
        private BuildingRepository $buildingRepository,
        private BuildingFactory $buildingFactory
    ) {
    }

    public function execute(UpgradeBuildingInSlotMessage $message): void
    {
        $buildings = $this->buildingRepository->findAllAtLocation(
            $message->getLocationX(),
            $message->getLocationY(),
        );
        $buildingAtSlot = $buildings->fromSlot($message->getSlot());
        if (! $buildingAtSlot) {
            $buildingAtSlot = $this->buildingFactory->create($message->getBuildingName());
            $buildingAtSlot->setLocationX($message->getLocationX());
            $buildingAtSlot->setLocationY($message->getLocationY());
            $buildingAtSlot->setSlot($message->getSlot());
        }
        $buildingAtSlot->upgrade();
        $message->setBuilding(BuildingView::fromEntity($buildingAtSlot));
        $this->buildingRepository->add($buildingAtSlot);
    }
}
