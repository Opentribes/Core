<?php
declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Entity\Building;

final class BuildingView
{
    public string $name;

    public static function fromEntity(Building $building):self
    {
        $view = new self();
        $view->name = $building->getName();
        return $view;
    }
}