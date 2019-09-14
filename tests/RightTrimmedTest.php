<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\RightTrimmed;
use Exception;
use PHPUnit\Framework\TestCase;

class RightTrimmedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            " \t\n\r\0\x0Bbar",
            RightTrimmed::defaultChars(
                new Just(" \t\n\r\0\x0Bbar\0\x0B")
            )->asString()
        );

        $this->assertEquals(
            'foobar',
            (new RightTrimmed(
                new Just('foobarfoo'),
                new Just('fo')
            ))->asString()
        );
    }
}
