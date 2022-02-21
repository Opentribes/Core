<?php
declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Message\CheckPlayerHasCityMessage;
use OpenTribes\Core\Repository\CityRepository;

final class CheckPlayerHasCity
{


    public function __construct(private CityRepository $cityRepository)
    {
    }

    public function process(CheckPlayerHasCityMessage $message):void
    {
        $countUserCities = $this->cityRepository->countByUsername($message->getUsername());
        if($countUserCities > 0){
            $message->enableResult();
        }
    }
}