<?php

/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

declare(strict_types=1);

namespace ElegantBro\Stringify\Tests\Base64;

use ElegantBro\Stringify\Base64\Base64Decoded;
use ElegantBro\Stringify\Just;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class Base64DecodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals('foobar', (new Base64Decoded(new Just('Zm9vYmFy')))->asString());
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The input contains character from outside the base64 alphabet');
        $this->assertEquals('foobar', (new Base64Decoded(new Just('Zm9vYmFy,')))->asString());
    }
}
