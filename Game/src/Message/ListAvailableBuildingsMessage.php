<?php
declare(strict_types=1);

namespace OpenTribes\Core\Message;

use OpenTribes\Core\View\BuildingViewCollection;

interface ListAvailableBuildingsMessage
{
    public function getBuildings():BuildingViewCollection;
}