<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\Collectible;

final class Building implements Collectible
{
    private string $slot = '';
    private int $level = 0;
    private int $locationX = 0;
    private int $locationY = 0;
    public function __construct(private string $name)
    {
    }

    public function setSlot(string $slot): void
    {
        $this->slot = $slot;
    }

    public function getSlot(): string
    {
        return $this->slot;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function upgrade(): void
    {
        $this->level++;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLocationX(int $locationX): void
    {
        $this->locationX = $locationX;
    }

    public function setLocationY(int $locationY): void
    {
        $this->locationY = $locationY;
    }

    public function downgrade(): void
    {
        $this->level--;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }
}
