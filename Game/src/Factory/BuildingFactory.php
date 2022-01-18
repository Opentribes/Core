<?php

declare(strict_types=1);

namespace OpenTribes\Core\Factory;

use OpenTribes\Core\Entity\Building;

final class BuildingFactory
{
    public function create(string $buildingName): Building
    {
        return new Building($buildingName);
    }
}
