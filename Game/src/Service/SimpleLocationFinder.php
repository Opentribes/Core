<?php
declare(strict_types=1);

namespace OpenTribes\Core\Service;

use OpenTribes\Core\Repository\CityRepository;
use OpenTribes\Core\Utils\Location;

final class SimpleLocationFinder implements LocationFinder
{
    public function __construct(private CityRepository $cityRepository){

    }
    public function findUnusedLocation(): Location
    {
        $locationX = 0;
        $locationY = 0;

        do{
            $location = new Location($locationX,$locationY);

            $countCitiesAtLocation = $this->cityRepository->countAtLocation($location);

            if($countCitiesAtLocation !== 0){
                 $location = null;
            }
            $locationX++;
        }while(!$location);


        return $location;
    }

}