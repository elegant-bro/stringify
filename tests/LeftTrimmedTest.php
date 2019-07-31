<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\LeftTrimmed;
use Exception;
use PHPUnit\Framework\TestCase;

class LeftTrimmedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "bar\0\x0B",
            LeftTrimmed::defaultChars(
                new Just(" \t\n\r\0\x0Bbar\0\x0B")
            )->asString()
        );

        $this->assertEquals(
            'barfoo',
            (new LeftTrimmed(
                new Just('foobarfoo'),
                new Just('fo')
            ))->asString()
        );
    }
}