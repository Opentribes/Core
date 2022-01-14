<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\AbstractCollection;

final class BuildingCollection extends AbstractCollection
{
    public function fromSlot(int $slotNumber): ?Building
    {
        $result = $this->filter(function ($building) use ($slotNumber) {
            return $building->getSlotNumber() === $slotNumber;
        });

        return array_shift($result);
    }
}