<?php

declare(strict_types=1);


namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Just;
use Exception;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;
use function ElegantBro\Stringify\just;
use function ElegantBro\Stringify\raw;

class FunctionsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testRaw(): void
    {
        $this->assertEquals(
            'foo bar',
            raw(new Just('foo bar'))
        );
    }

    /**
     * @throws Exception
     */
    public function testJust(): void
    {
        $this->assertEquals(
            'bar baz',
            just('bar baz')->asString()
        );

        $this->assertEquals(
            '1',
            just(1)->asString()
        );

        $this->assertEquals(
            '',
            just(false)->asString()
        );

        $this->assertEquals(
            '1',
            just(true)->asString()
        );

        $this->assertEquals(
            '0.5',
            just(.5)->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testJustArray(): void
    {
        $this->expectException(LogicException::class);
        just([]);
    }

    /**
     * @throws Exception
     */
    public function testJustObject(): void
    {
        $this->expectException(LogicException::class);
        just(new stdClass());
    }
}
