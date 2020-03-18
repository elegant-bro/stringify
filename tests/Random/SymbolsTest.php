<?php

namespace ElegantBro\Stringify\Tests\Random;

use ElegantBro\Stringify\Random\Symbols;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use function ElegantBro\Stringify\just;

class SymbolsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $symbols = new Symbols(just('ABCD123'), 5);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals($value, (new Symbols(just('ABCD123'), 5))->asString());
        $this->assertRegExp('/(^[ABCD123]{5})$/u', $value);
    }

    /**
     * @throws Exception
     */
    public function testAsStringUTF(): void
    {
        $symbols = new Symbols(just('АБВГ9876'), 10);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals($value, (new Symbols(just('ABCD123'), 5))->asString());
        $this->assertRegExp('/(^[АБВГ9876]{10})$/u', $value);
    }

    /**
     * @throws Exception
     */
    public function testAsStringEmoji(): void
    {
        $symbols = new Symbols(just('😀😁😂🤣😃😄GHJK'), 16);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals($value, (new Symbols(just('ABCD123'), 5))->asString());
        $this->assertRegExp('/(^[😀😁😂🤣😃😄GHJK]{16})$/u', $value);
    }

    /**
     * @throws Exception
     */
    public function testAsStringFails(): void
    {
        $symbols = new Symbols(just('A'), 0);
        $this->expectException(InvalidArgumentException::class);
        $symbols->asString();
    }
}
