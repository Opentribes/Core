<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Tests\Mock\Message\MockListAvailableBuildingsMessage;
use OpenTribes\Core\UseCase\ListAvailableBuildings;
use PHPUnit\Framework\TestCase;


final class ListAvailableBuildingsTest extends TestCase
{
    public function testNoBuildingsAreAvailable(): void
    {
        $message = new MockListAvailableBuildingsMessage();

        $useCase = new ListAvailableBuildings();
        $useCase->execute($message);
        $this->assertEmpty($message->getBuildings());
    }
}
