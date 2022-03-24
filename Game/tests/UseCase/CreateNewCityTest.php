<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Repository\CityRepository;
use OpenTribes\Core\Service\LocationFinder;
use OpenTribes\Core\Tests\Mock\Message\MockCreateNewCityMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockCityRepository;
use OpenTribes\Core\Tests\Mock\Service\MockLocationFinder;
use OpenTribes\Core\UseCase\CreateNewCityUseCase;
use OpenTribes\Core\Utils\Location;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass CreateNewCityUseCase
 */
final class CreateNewCityTest extends TestCase
{
    private function getUseCase(?CityRepository $cityRepository =null,
        ?LocationFinder $locationFinder = null):CreateNewCityUseCase{
        if(!$cityRepository){
            $cityRepository = new MockCityRepository();
        }
        if(!$locationFinder){
            $locationFinder = new MockLocationFinder(new Location(10,10));
        }
        return new CreateNewCityUseCase($cityRepository,$locationFinder);
    }
    public function testFailedToCreateCity():void
    {

        $useCase = $this->getUseCase();
        $message = new MockCreateNewCityMessage();
        $useCase->process($message);
        $this->assertFalse($message->cityCreated());
    }
    public function testCityCreated():void
    {
        $cityRepository = new MockCityRepository(0,true);
        $useCase = $this->getUseCase($cityRepository);
        $message = new MockCreateNewCityMessage();
        $useCase->process($message);
        $this->assertTrue($message->cityCreated());
    }
    public function testCityCreatedAtLocation():void{
        $cityRepository = new MockCityRepository(0,true);
        $useCase = $this->getUseCase($cityRepository);
        $message = new MockCreateNewCityMessage();
        $useCase->process($message);
        $expectedLocation = new Location(10,10);
        $this->assertTrue($message->cityCreated());
        $this->assertEquals($expectedLocation,$message->city->location);
    }
    public function testCityCreatedOnDifferentLocation():void{
        $cityRepository = new MockCityRepository(0,true);
        $expectedLocation = new Location(20,10);
        $locationFinder = new MockLocationFinder($expectedLocation);
        $useCase = $this->getUseCase($cityRepository,$locationFinder);
        $message = new MockCreateNewCityMessage();
        $useCase->process($message);
        $this->assertTrue($message->cityCreated());
        $this->assertEquals($expectedLocation,$message->city->location);
    }
}
