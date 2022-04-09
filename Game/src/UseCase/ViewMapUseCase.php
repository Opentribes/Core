<?php

declare(strict_types=1);

namespace OpenTribes\Core\UseCase;

use OpenTribes\Core\Message\ViewMapMessage;
use OpenTribes\Core\Repository\MapTileRepository;
use OpenTribes\Core\View\MapView;
use OpenTribes\Core\View\TileView;
use OpenTribes\Core\View\TileViewCollection;

final class ViewMapUseCase
{

    public function __construct(private MapTileRepository $mapTilesRepository)
    {
    }

    public function process(ViewMapMessage $message): void
    {
        $tiles = $this->mapTilesRepository->findByViewport($message->getViewport());
        $backgroundLayer = new TileViewCollection();
        foreach ($tiles as $tile) {
            $tileView = TileView::createFromEntity($tile);
            $backgroundLayer[] = $tileView;
        }

        $map = new MapView($backgroundLayer);

        $message->setMap($map);
    }
}