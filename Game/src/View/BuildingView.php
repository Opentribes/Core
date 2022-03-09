<?php

declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Enum\BuildStatus;
use OpenTribes\Core\Entity\Building;
use OpenTribes\Core\Utils\Collectible;

final class BuildingView implements Collectible
{
    public string $name = '';
    public BuildStatus $status;
    public int $level = 0;
    public static function fromEntity(Building $building): self
    {
        $view = new self();
        $view->name = $building->getName();
        $view->level = $building->getLevel();
        $view->status = $building->getStatus();
        return $view;
    }
}
