<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Repository;

use OpenTribes\Core\Entity\BuildingCollection;
use OpenTribes\Core\Repository\BuildingRepository;

final class MockBuildingRepository implements BuildingRepository
{
    public function __construct(private array $collection = [])
    {
    }

    public function findAllAtLocation(int $locationX, int $locationY): BuildingCollection
    {
        return new BuildingCollection($this->collection);
    }

}