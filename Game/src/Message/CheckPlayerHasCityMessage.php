<?php

declare(strict_types=1);

namespace OpenTribes\Core\Message;

interface CheckPlayerHasCityMessage
{
    public function hasCities(): bool;

    public function getUsername(): string;

    public function enableResult(): void;
}
