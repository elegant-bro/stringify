<?php

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\NotEmptyStr;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class NotEmptyStrTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $string = 'test';
        $this->assertSame($string, (new NotEmptyStr(new Just($string)))->asString());
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(RuntimeException::class);
        (new NotEmptyStr(new Just('')))->asString();
    }
}
