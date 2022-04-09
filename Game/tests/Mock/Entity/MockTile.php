<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Entity;

use OpenTribes\Core\Entity\Tile;
use OpenTribes\Core\Utils\Location;

final class MockTile implements Tile
{

    public function __construct(private Location $location)
    {
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

}