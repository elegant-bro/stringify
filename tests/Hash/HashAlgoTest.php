<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests\Hash;

use ElegantBro\Stringify\Hash\Algorithm;
use ElegantBro\Stringify\Just;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HashAlgoTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'md5',
            Algorithm::md5()->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported algo foobar');
        (new Algorithm(
            new Just('foobar')
        ))->asString();
    }
}
