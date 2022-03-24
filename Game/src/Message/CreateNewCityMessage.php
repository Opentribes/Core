<?php

declare(strict_types=1);

namespace OpenTribes\Core\Message;

use OpenTribes\Core\View\CityView;

interface CreateNewCityMessage
{
    public function cityCreated(): bool;

    public function activateCreated(): void;

    public function setCity(CityView $city): void;
}
