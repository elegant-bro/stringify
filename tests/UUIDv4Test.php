<?php

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\UUIDv4;
use Exception;
use PHPUnit\Framework\TestCase;

class UUIDv4Test extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $uuid = new UUIDv4();
        $this->assertNotEmpty($value = $uuid->asString());
        $this->assertEquals($value, $uuid->asString());
        $this->assertNotEquals($value, (new UUIDv4())->asString());
    }
}
