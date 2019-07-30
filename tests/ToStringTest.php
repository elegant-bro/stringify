<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\ToString;
use PHPUnit\Framework\TestCase;

class ToStringTest extends TestCase
{
    public function testToString(): void
    {
        $this->assertEquals('foo', new ToString(new Just('foo')));
    }
}