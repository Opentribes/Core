<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\Mock\Message;

use OpenTribes\Core\Message\ViewMapMessage;
use OpenTribes\Core\Utils\Viewport;
use OpenTribes\Core\View\MapView;

final class MockViewMapMessage implements ViewMapMessage
{
    public ?MapView $map = null;
    public function __construct(private Viewport $viewport)
    {
    }

    public function getViewport(): Viewport
    {
      return $this->viewport;
    }

    public function setMap(MapView $map)
    {
       $this->map =$map;
    }

}