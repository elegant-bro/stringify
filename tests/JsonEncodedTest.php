<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\JsonEncoded;
use Exception;
use PHPUnit\Framework\TestCase;

class JsonEncodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals('[]', JsonEncoded::default([])->asString());
        $this->assertEquals('[1,"foo"]', JsonEncoded::default([1, 'foo'])->asString());
        $this->assertEquals('{"foo":"bar"}', JsonEncoded::default(['foo' => 'bar'])->asString());
    }
}
