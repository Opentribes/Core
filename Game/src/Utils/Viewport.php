<?php
declare(strict_types=1);

namespace OpenTribes\Core\Utils;

final class Viewport
{
    private int $minimumY;
    private int $maximumY;
    private int $minimumX;
    private int $maximumX;
    public function __construct(private Location $location,private int $width,private int $height){
        $halfWidth = (int)floor($this->width/2);
        $halfHeight = (int)floor($this->height/2);
        $this->minimumX = $this->location->getX() - $halfWidth;
        $this->maximumX = $this->location->getX() + $halfWidth;
        $this->minimumY = $this->location->getY() - $halfHeight;
        $this->maximumY = $this->location->getY() + $halfHeight;
    }

    /**
     * @return int
     */
    public function getMinimumY(): int
    {
        return $this->minimumY;
    }

    /**
     * @return int
     */
    public function getMaximumY(): int
    {
        return $this->maximumY;
    }

    /**
     * @return int
     */
    public function getMinimumX(): int
    {
        return $this->minimumX;
    }

    /**
     * @return int
     */
    public function getMaximumX(): int
    {
        return $this->maximumX;
    }



}