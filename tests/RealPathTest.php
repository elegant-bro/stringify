<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\RealPath;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class RealPathTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        chdir(__DIR__);
        $this->assertEquals(
            __DIR__,
            (new RealPath(
                new Just('../tests')
            ))->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Path \'../tests\' not exists');
        (new RealPath(
            new Just('../tests')
        ))->asString();
    }
}