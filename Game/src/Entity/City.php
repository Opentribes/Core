<?php

declare(strict_types=1);

namespace OpenTribes\Core\Entity;

use DateTimeInterface;
use OpenTribes\Core\Utils\Collectible;
use OpenTribes\Core\Utils\Location;

 class City implements Collectible
 {
     private int $id;
     private int $locationX;
     private int $locationY;

     private BuildingCollection $buildings;
     private DateTimeInterface $createdAt;
     private $user;

     public function __construct(private Location $location)
     {
         $this->locationY = $this->location->getY();
         $this->locationX = $this->location->getX();
         $this->buildings = new BuildingCollection();
     }

     public function getLocation(): Location
     {
         return new Location($this->locationX, $this->locationY);
     }

     public function setLocation(Location $location): void
     {
         $this->location = $location;
         $this->locationY = $this->location->getY();
         $this->locationX = $this->location->getX();
     }

     public function getBuildings(): BuildingCollection
     {
         return $this->buildings;
     }

     public function setBuildings(BuildingCollection $buildings): void
     {
         /** @var Building $building */
         foreach ($buildings as $building) {
             $building->setCity($this);
         }
         $this->buildings = $buildings;
     }

     public function getUser(): mixed
     {
         return $this->user;
     }

     public function setUser(mixed $user): void
     {
         $this->user = $user;
     }
 }
