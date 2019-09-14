<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Imploded;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class ImplodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'foo-bar',
            (new Imploded(
                new Just('-'),
                ['foo', 'bar']
            ))->asString()
        );

        $this->assertEquals('foo,bar', Imploded::withComma(['foo', 'bar'])->asString());
    }
}
