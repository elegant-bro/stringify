<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\HashAlgo;
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
            HashAlgo::md5()->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported algo foobar');
        (new HashAlgo(
            new Just('foobar')
        ))->asString();
    }
}