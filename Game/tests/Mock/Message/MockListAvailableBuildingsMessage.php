<?php

declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\ListAvailableBuildingsMessage;
use OpenTribes\Core\View\BuildingViewCollection;

final class MockListAvailableBuildingsMessage implements ListAvailableBuildingsMessage
{
    private BuildingViewCollection $buildings;

    public function __construct()
    {
        $this->buildings = new BuildingViewCollection();
    }

    public function getBuildings(): BuildingViewCollection
    {
        return $this->buildings;
    }

}