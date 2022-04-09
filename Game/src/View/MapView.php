<?php
declare(strict_types=1);

namespace OpenTribes\Core\View;

final class MapView
{

    public function __construct(public readonly TileViewCollection $backgroundLayer)
    {
    }
}