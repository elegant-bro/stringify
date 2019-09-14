<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Cached;
use ElegantBro\Stringify\Stringify;
use Exception;
use PHPUnit\Framework\TestCase;

class CachedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsStringCalledOnlyOnce(): void
    {
        $value = 'word';

        $string = $this->createMock(Stringify::class);
        $string->expects($this->once())
            ->method('asString')
            ->willReturn($value);
        $cached = new Cached($string);

        $this->assertSame($value, $cached->asString());
        $this->assertTrue($cached->isFilled());
        $this->assertSame($value, $cached->asString());
    }

    /**
     * @throws Exception
     */
    public function testWipeCached(): void
    {
        $value = 'word';

        $string = $this->createMock(Stringify::class);
        $string->expects($this->exactly(2))
            ->method('asString')
            ->willReturn($value);
        $cached = new Cached($string);

        $this->assertSame($value, $cached->asString());
        $this->assertTrue($cached->isFilled());
        $cached->wipeCache();
        $this->assertFalse($cached->isFilled());
        $this->assertSame($value, $cached->asString());
        $this->assertTrue($cached->isFilled());
    }
}
