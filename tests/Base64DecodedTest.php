<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Base64Decoded;
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
        $this->assertEquals('foobar', (new Base64Decoded('Zm9vYmFy'))->asString());
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The input contains character from outside the base64 alphabet');
        $this->assertEquals('foobar', (new Base64Decoded('Zm9vYmFy,'))->asString());
    }
}