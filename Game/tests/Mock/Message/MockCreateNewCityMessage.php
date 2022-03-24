<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\CreateNewCityMessage;
use OpenTribes\Core\View\CityView;

final class MockCreateNewCityMessage implements CreateNewCityMessage
{
    private bool $created = false;
    public CityView $city;
    public function activateCreated(): void
    {
        $this->created = true;
    }


    public function cityCreated():bool
    {
        return $this->created;
    }

    public function setCity(CityView $city):void
    {
         $this->city = $city;
    }


}