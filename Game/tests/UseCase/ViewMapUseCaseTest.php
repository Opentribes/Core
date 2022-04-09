<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Tests\Mock\Message\MockViewMapMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockMapTileRepository;
use OpenTribes\Core\UseCase\ViewMapUseCase;
use OpenTribes\Core\Utils\Location;
use OpenTribes\Core\Utils\Viewport;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \OpenTribes\Core\UseCase\ViewMapUseCase
 */
final class ViewMapUseCaseTest extends TestCase
{

    public function testCanShowMap(): void
    {
        $tilesRepository = new MockMapTileRepository();
        $viewPort = new Viewport(new Location(1,1),3,3);
        $message = new MockViewMapMessage($viewPort);
        $useCase = new ViewMapUseCase($tilesRepository);
        $useCase->process($message);
        $this->assertNotNull($message->map);
    }

    public function testCanFindTilesInViewPort(): void
    {
        $tilesRepository = new MockMapTileRepository();
        $viewPort = new Viewport(new Location(1,1),3,3);
        $message = new MockViewMapMessage($viewPort);
        $useCase = new ViewMapUseCase($tilesRepository);
        $useCase->process($message);

        $expectedArray = [
            '0-0', '0-1', '0-2',  '1-0', '1-1', '1-2', '2-0', '2-1', '2-2',
        ];

        $tiles = $message->map->backgroundLayer;
        $actualArray = [];
        foreach($tiles as $tile){
            $actualArray[]=$tile->location->getY().'-'.$tile->location->getX();
        }
        $this->assertSame($expectedArray,$actualArray);
    }
}