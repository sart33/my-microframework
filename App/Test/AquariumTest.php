<?php
namespace App\Test;

use App\Model\Aquarium;
use App\Model\Model;
use PHPUnit\Framework\TestCase;

class AquariumTest extends TestCase
{
    private $aquarium;

    protected function setUp():void {
        $this->aquarium = new Aquarium();
    }

    protected function tearDown():void {
        $this->aquarium = NULL;
    }


}