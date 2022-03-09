<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Tests\Mock\Entity\MockBuilding;
use OpenTribes\Core\Utils\Collection;

final class BuildingCollection extends Collection
{
    public function fromSlot(string $slotNumber): ?MockBuilding
    {
        /** @var array<MockBuilding> $result */
        $result = $this->filter(
            static function (MockBuilding $building) use ($slotNumber) {
                return $building->getSlot() === $slotNumber;
            }
        );

        return array_shift($result);
    }
}
