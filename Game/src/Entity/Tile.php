<?php
declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\Collectible;
use OpenTribes\Core\Utils\Location;

interface Tile extends Collectible
{
    public function getLocation():Location;
}