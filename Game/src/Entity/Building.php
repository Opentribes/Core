<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use DateTime;
use DateTimeInterface;
use OpenTribes\Core\Enum\BuildStatus;
use OpenTribes\Core\Utils\Collectible;

final class Building implements Collectible
{
    private int $id;
    private string $slot = '';
    private int $level = 0;
    private int $cityId;
    private City $city;
    private BuildStatus $status;
    private DateTimeInterface $createdAt;

    public function __construct(private string $name, private int $maximumLevel)
    {
        $this->status = BuildStatus::default;
        $this->createdAt = new DateTime();
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

    public function downgrade(): void
    {
        $this->level--;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getStatus(): BuildStatus
    {
        return $this->status;
    }

    public function setStatus(BuildStatus $status): void
    {
        $this->status = $status;
    }

    public function getMaximumLevel(): int
    {
        return $this->maximumLevel;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }
}
