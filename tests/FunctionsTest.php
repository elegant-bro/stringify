<?php declare(strict_types=1);


namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;
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
}
