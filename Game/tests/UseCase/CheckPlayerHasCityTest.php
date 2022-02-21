<?php
declare(strict_types=1);

namespace OpenTribes\Core\Tests\UseCase;

use OpenTribes\Core\Tests\Mock\Message\MockCheckPlayerHasCityMessage;
use OpenTribes\Core\Tests\Mock\Repository\MockCityRepository;
use OpenTribes\Core\UseCase\CheckPlayerHasCity;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass CheckPlayerHasCity
 */
final class CheckPlayerHasCityTest extends TestCase
{
    public function testThatPlayerHasNoCity():void{
        $cityRepository = new MockCityRepository();
        $message = new MockCheckPlayerHasCityMessage();
        $useCase = new CheckPlayerHasCity($cityRepository);
        $useCase->process($message);
        $this->assertFalse($message->hasCities());
    }
    public function testThatPlayerHasCity():void{
        $cityRepository = new MockCityRepository(1);
        $message = new MockCheckPlayerHasCityMessage();
        $useCase = new CheckPlayerHasCity($cityRepository);
        $useCase->process($message);
        $this->assertTrue($message->hasCities());
    }
}
