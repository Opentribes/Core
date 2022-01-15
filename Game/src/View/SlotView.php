<?php

declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Utils\Collectable;

final class SlotView implements Collectable
{
    public ?BuildingView $building = null;
}
