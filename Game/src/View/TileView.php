<?php
declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Entity\Tile;
use OpenTribes\Core\Utils\Location;

final class TileView
{
    public function __construct(public readonly Location $location){}
    public static function createFromEntity(Tile $tile):self
    {
        return new self($tile->getLocation());
    }
}