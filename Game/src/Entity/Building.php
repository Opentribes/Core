<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

final class Building
{
    public function __construct(private string $name,private int $slotNumber)
    {
    }

    /**
     * @return int
     */
    public function getSlotNumber(): int
    {
        return $this->slotNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}