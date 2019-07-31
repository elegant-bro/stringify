<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class JustTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals('foo', (new Just('foo'))->asString());
    }
}