<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\CheckPlayerHasCityMessage;

final class MockCheckPlayerHasCityMessage implements CheckPlayerHasCityMessage
{
    private bool $hasCities = false;
    public function getUsername(): string
    {
        return '';
    }

    public function enableResult(): void
    {
      $this->hasCities = true;
    }


    public function hasCities():bool
    {
        return $this->hasCities;
    }
}