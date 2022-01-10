<?php

namespace ElegantBro\Stringify\Tests\Random;

use ElegantBro\Stringify\Random\Symbols;
use ElegantBro\Stringify\Tests\Stubs\Alphabet;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SymbolsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $symbols = new Symbols(new Alphabet(['A','B','C','D','1','2','3']), 5);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals(
            $value,
            (new Symbols(
                new Alphabet(['A','B','C','D','1','2','3']),
                5)
            )->asString());
        $this->assertMatchesRegularExpression('/(^[ABCD123]{5})$/u', $value);
    }

    /**
     * @throws Exception
     */
    public function testAsStringUTF(): void
    {
        $symbols = new Symbols(new Alphabet(['А','Б','В','Г','9','8','7','6']), 10);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals(
            $value,
            (new Symbols(
                new Alphabet(['А','Б','В','Г','9','8','7','6']),
                10
            ))->asString());
        $this->assertMatchesRegularExpression('/(^[АБВГ9876]{10})$/u', $value);
        explode()
    }

    /**
     * @throws Exception
     */
    public function testAsStringEmoji(): void
    {
        $symbols = new Symbols(new Alphabet(['👌', '😁', '😂', '🤣', '😃', '😄', 'G', 'H', 'J', 'K']), 16);
        $this->assertNotEmpty($value = $symbols->asString());
        $this->assertEquals($value, $symbols->asString());
        $this->assertNotEquals(
            $value,
            (new Symbols(
                new Alphabet(['😀', '😁', '😂', '🤣', '😃', '😄', 'G', 'H', 'J', 'K']),
                5
            ))->asString());
        $this->assertMatchesRegularExpression('/(^[👌😁😂🤣😃😄GHJK]{16})$/u', $value);
    }

    /**
     * @throws Exception
     */
    public function testAsStringFails(): void
    {
        $symbols = new Symbols(new Alphabet(['А']), 0);
        $this->expectException(InvalidArgumentException::class);
        $symbols->asString();
    }
}
