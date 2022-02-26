<?php

declare(strict_types=1);

namespace OpenTribes\Core\View;

use OpenTribes\Core\Entity\City;
use OpenTribes\Core\Utils\Location;

final class CityView
{
    public Location $location;

    public static function fromEntity(City $city): self
    {
        $view = new self();
        $view->location = $city->getLocation();

        return $view;
    }
}
