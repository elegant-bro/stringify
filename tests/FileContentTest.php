<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\FileContent;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class FileContentTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'foobar',
            (new FileContent(
                new Just(__DIR__ . '/fixtures/foobar.txt')
            ))->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsStringEmpty(): void
    {
        $this->assertEquals(
            '',
            (new FileContent(
                new Just(__DIR__ . '/fixtures/empty.txt')
            ))->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(RuntimeException::class);
        (new FileContent(
            new Just(__DIR__ . '/fixtures/no.file')
        ))->asString();
    }
}
