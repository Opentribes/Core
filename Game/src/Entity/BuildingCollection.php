<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\Collection;

final class BuildingCollection extends Collection
{
    public function fromSlot(string $slotNumber): ?Building
    {
        /** @var array<Building> $result */
        $result = $this->filter(
            static function (Building $building) use ($slotNumber) {
                return $building->getSlot() === $slotNumber;
            }
        );

        return array_shift($result);
    }
}
