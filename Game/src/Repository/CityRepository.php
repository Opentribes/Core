<?php

declare(strict_types=1);

namespace OpenTribes\Core\Repository;

use OpenTribes\Core\Entity\City;
use OpenTribes\Core\Utils\Location;

interface CityRepository
{
    public function countByUsername(string $username): int;

    public function add(City $city): bool;

    public function countAtLocation(Location $location): int;
    public function findAtLocation(Location $location): City;
}
