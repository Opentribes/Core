<?php

declare(strict_types=1);

namespace OpenTribes\Core\Repository;

use OpenTribes\Core\Entity\Building;

final class BuildingCollection
{
    public function __construct(private array $collection = [])
    {
    }

    public function fromSlot(int $slotNumber): ?Building
    {
        $result = array_filter($this->collection, function ($building) use ($slotNumber) {
            return $building->getSlotNumber() === $slotNumber;
        });
        return array_shift($result);
    }
}