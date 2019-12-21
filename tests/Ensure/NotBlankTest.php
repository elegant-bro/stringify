<?php

namespace ElegantBro\Stringify\Tests\Ensure;

use ElegantBro\Stringify\Ensure\NotBlank;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class NotBlankTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $string = 'test';
        $this->assertSame($string, (new NotBlank(new Just($string)))->asString());
    }

    /**
     * @throws Exception
     */
    public function testAsStringException(): void
    {
        $this->expectException(RuntimeException::class);
        (new NotBlank(new Just('')))->asString();
    }
}
