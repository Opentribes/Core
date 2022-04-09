<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Repository;

use OpenTribes\Core\Entity\TileCollection;
use OpenTribes\Core\Repository\MapTileRepository;
use OpenTribes\Core\Tests\Mock\Entity\MockTile;
use OpenTribes\Core\Utils\Location;
use OpenTribes\Core\Utils\Viewport;

final class MockMapTileRepository implements MapTileRepository
{
    private TileCollection $tileCollection;
    public function __construct(int $width = 3,int $height=3)
    {
        $this->tileCollection = new TileCollection();
        for($y = 0;$y<$height;$y++){
            for($x = 0;$x<$width;$x++){
                $this->tileCollection[]=new MockTile(new Location($x,$y));
            }
        }
    }

    public function findByViewport(Viewport $viewport):TileCollection
    {
        return $this->tileCollection;
    }

}