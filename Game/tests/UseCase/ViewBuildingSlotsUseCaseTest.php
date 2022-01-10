<?php

namespace OpenTribes\Core\Tests;


use OpenTribes\Core\Tests\Mock\Message\MockViewBuildingSlotsMessage;
use OpenTribes\Core\UseCase\ViewBuildingSlotsUseCase;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \OpenTribes\Core\UseCase\ViewBuildingSlotsUseCase
 */
final class ViewBuildingSlotsUseCaseTest extends TestCase
{

    public function testSlotsAreNotExisting():void{

        $useCase = new ViewBuildingSlotsUseCase();
        $message = new MockViewBuildingSlotsMessage();
        $useCase->execute($message);

        $this->assertEmpty($message->getSlots());
    }


    public function testCanViewSlots():void{
        $useCase = new ViewBuildingSlotsUseCase();
        $message = new MockViewBuildingSlotsMessage(2);
        $useCase->execute($message);

        $this->assertNotEmpty($message->getSlots());
        $this->assertCount(2,$message->getSlots());
    }



}
