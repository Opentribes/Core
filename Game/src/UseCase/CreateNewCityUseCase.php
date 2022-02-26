<?php

declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Entity\City;
use OpenTribes\Core\Message\CreateNewCityMessage;
use OpenTribes\Core\Repository\CityRepository;
use OpenTribes\Core\Service\LocationFinder;
use OpenTribes\Core\View\CityView;

final class CreateNewCityUseCase
{
    public function __construct(
        private CityRepository $cityRepository,
        private LocationFinder $locationFinder
    ) {
    }

    public function process(CreateNewCityMessage $message): void
    {
        $location = $this->locationFinder->findUnusedLocation();
        $city = new City($location);

        if ($this->cityRepository->add($city)) {
            $message->setCity(CityView::fromEntity($city));
            $message->activateCreated();
        }
    }
}
