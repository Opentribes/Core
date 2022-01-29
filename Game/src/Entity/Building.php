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
    private int $locationX = 0;
    private int $locationY = 0;
    private string $username;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


}
