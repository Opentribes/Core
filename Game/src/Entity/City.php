<?php
declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use OpenTribes\Core\Utils\Collectible;
use OpenTribes\Core\Utils\Location;

final class City implements Collectible
{
    public function __construct(private Location $location){

    }

    public function getLocation():Location
    {
        return $this->location;
    }
}