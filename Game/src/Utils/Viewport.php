<?php
declare(strict_types=1);

namespace OpenTribes\Core\Utils;

final class Viewport
{
    public function __construct(private Location $location,private int $width,private int $height){

    }

}