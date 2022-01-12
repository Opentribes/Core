<?php
declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Entity\Building;

final class SlotView
{
    private ?Building $building;

    /**
     * @return Building|null
     */
    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    /**
     * @param Building|null $building
     */
    public function setBuilding(?Building $building): void
    {
        $this->building = $building;
    }

}