<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

final class Building
{
    public function __construct(private int $slotNumber)
    {
    }

    /**
     * @return int
     */
    public function getSlotNumber(): int
    {
        return $this->slotNumber;
    }
}