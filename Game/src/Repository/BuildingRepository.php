<?php

declare(strict_types=1);

namespace OpenTribes\Core\Repository;


interface BuildingRepository
{
    public function findAllAtLocation(int $locationX, int $locationY): BuildingCollection;
}