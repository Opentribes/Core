<?php

declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Utils\Collectable;

final class BuildingView implements Collectable
{
    public string $name = '';

    public static function fromEntity(Building $building): self
    {
        $view = new self();
        $view->name = $building->getName();
        return $view;
    }
}
