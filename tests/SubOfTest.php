<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\SubOf;
use Exception;
use PHPUnit\Framework\TestCase;

class SubOfTest extends TestCase
{
    /**
     * @param string $expected
     * @param string $in
     * @param int $start
     * @throws Exception
     * @dataProvider data
     */
    public function testAsString(string $in, int $start, string $expected): void
    {
        $this->assertEquals(
            $expected,
            (new SubOf(
                new Just($in),
                $start
            ))->asString()
        );
    }

    /**
     * @param string $in
     * @param int $start
     * @param int $length
     * @param string $expected
     * @throws Exception
     * @dataProvider dataWithLength
     */
    public function testAsStringWithLength(string $in, int $start, int $length, string $expected): void
    {
        $this->assertEquals(
            $expected,
            (new SubOf(
                new Just($in),
                $start,
                $length
            ))->asString()
        );
    }

    public function data(): array
    {
        /** @noinspection SpellCheckingInspection */
        return [
            ['foobar', 0, 'foobar'],
            ['foobar', 1, 'oobar'],
            ['foobar', 2, 'obar'],
            ['foobar', 3, 'bar'],
            ['foobar', 10, ''],
            ['foobar', -1, 'r'],
            ['foobar', -2, 'ar'],
            ['foobar', -3, 'bar'],
            ['foobar', -10, 'foobar'],
        ];
    }

    public function dataWithLength(): array
    {
        /** @noinspection SpellCheckingInspection */
        return [
            ['foobar', 0, -1, 'fooba'],
            ['foobar', 0, -2, 'foob'],
            ['foobar', 0, -3, 'foo'],
            ['foobar', 1, -1, 'ooba'],
            ['foobar', 2, -2, 'ob'],
            ['foobar', -1, -1, ''],
            ['foobar', 4, -4, ''],

        ];
    }
}
