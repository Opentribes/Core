<?php

declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Enum\BuildStatus;
use OpenTribes\Core\Message\CompleteBuildingStatusMessage;
use OpenTribes\Core\Repository\BuildingRepository;

final class CompleteBuildingStatusUseCase
{
    public function __construct(private BuildingRepository $buildingRepository)
    {
    }

    public function execute(CompleteBuildingStatusMessage $message): void
    {
        $buildings = $this->buildingRepository->findAllAtLocation(
            $message->getLocationX(),
            $message->getLocationY()
        );
        /** @var Building $building */
        foreach ($buildings as $building) {
            if ($building->getStatus() === BuildStatus::default) {
                continue;
            }
            if ($building->getStatus() === BuildStatus::DOWNGRADING) {
                $building->downgrade();
            }
            if ($building->getStatus() === BuildStatus::UPGRADING) {
                $building->upgrade();
            }
            $building->setStatus(BuildStatus::default);
            $message->incrementCompleted();
            $this->buildingRepository->add($building);
        }
    }
}
