<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\Collectible;

final class Building implements Collectible
{
    private int $slotNumber = 0;

    public function __construct(private string $name)
    {
    }

    public function setSlotNumber(int $slotNumber): void
    {
        $this->slotNumber = $slotNumber;
    }

    public function getSlotNumber(): int
    {
        return $this->slotNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
