<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\Trimmed;
use Exception;
use PHPUnit\Framework\TestCase;

class TrimmedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'bar',
            Trimmed::defaultChars(
                new Just(" \t\n\rbar\0\x0B")
            )->asString()
        );

        $this->assertEquals(
            'bar',
            (new Trimmed(
                new Just('foobar oof'),
                new Just('fo ')
            ))->asString()
        );
    }
}
