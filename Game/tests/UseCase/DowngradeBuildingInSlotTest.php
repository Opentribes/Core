<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Exception\InvalidDowngrade;
use OpenTribes\Core\Tests\Mock\Message\MockDowngradeBuildingInSlot;
use OpenTribes\Core\Tests\Mock\Repository\MockBuildingRepository;
use OpenTribes\Core\UseCase\DowngradeBuildingInSlot;
use PHPUnit\Framework\TestCase;

final class DowngradeBuildingInSlotTest extends TestCase
{
    public function testSlotIsEmptyExceptionIsThrown(): void
    {
        $this->expectException(InvalidDowngrade::class);
        $repository = new MockBuildingRepository();
        $message = new MockDowngradeBuildingInSlot();
        $useCase = new DowngradeBuildingInSlot($repository);
        $useCase->execute($message);
    }
    public function testBuildingWasDowngraded(): void
    {
        $lumberJack = new Building('lumberjack');
        $lumberJack->setSlot('1');
        $lumberJack->setLevel(3);
        $repository = new MockBuildingRepository([$lumberJack]);

        $message = new MockDowngradeBuildingInSlot();
        $useCase = new DowngradeBuildingInSlot($repository);
        $useCase->execute($message);

        $this->assertNotEmpty($message->getBuilding());
        $this->assertSame(2,$message->getBuilding()->level);
    }

    public function testCanStoreDowngradedBuilding(): void
    {
        $lumberJack = new Building('lumberjack');
        $lumberJack->setSlot('1');
        $lumberJack->setLevel(3);
        $repository = new MockBuildingRepository([$lumberJack]);

        $message = new MockDowngradeBuildingInSlot();
        $useCase = new DowngradeBuildingInSlot($repository);
        $useCase->execute($message);
        $this->assertNotEmpty($repository->findAllAtLocation(1,1)->fromSlot('1'));
    }
}
