<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Tests\Mock\Message\MockListAvailableBuildingsMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockBuildingRepository;
use OpenTribes\Core\UseCase\ListAvailableBuildings;
use PHPUnit\Framework\TestCase;


final class ListAvailableBuildingsTest extends TestCase
{
    public function testNoBuildingsAreAvailable(): void
    {
        $message = new MockListAvailableBuildingsMessage();
        $mockBuildingRepository = new MockBuildingRepository();

        $useCase = new ListAvailableBuildings($mockBuildingRepository);
        $useCase->execute($message);
        $this->assertEmpty($message->getBuildings());
    }

    public function testAllBuildingsAreShown(): void
    {
        $message = new MockListAvailableBuildingsMessage();

        $mockBuildingRepository = new MockBuildingRepository([new Building('test1',1),new Building('Test 2',)]);
        $useCase = new ListAvailableBuildings($mockBuildingRepository);
        $useCase->execute($message);
        $this->assertSame(2, $message->getBuildings()->count());
    }
}
