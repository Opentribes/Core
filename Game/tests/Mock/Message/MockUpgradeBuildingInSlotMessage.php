<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\UpgradeBuildingInSlotMessage;
use OpenTribes\Core\View\BuildingView;

final class MockUpgradeBuildingInSlotMessage implements UpgradeBuildingInSlotMessage
{
    private BuildingView $buildingView;

    public function __construct(private string $name = ''){

    }
    public function getLocationX(): int
    {
        return 1;
    }

    public function getLocationY(): int
    {
       return 1;
    }

    public function getSlot(): string
    {
       return '1';
    }

    public function setBuilding(BuildingView $buildingView):void
    {
        $this->buildingView = $buildingView;
    }


    public function getBuilding(): BuildingView
    {
        return $this->buildingView;
    }

    public function getBuildingName(): string
    {
        return  $this->name;
    }


}