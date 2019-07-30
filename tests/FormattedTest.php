<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use ElegantBro\Stringify\Formatted;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class FormattedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            '5 foo bar',
            (new Formatted(
                new Just('%d %s bar'), 5, 'foo'
            ))->asString()
        );
    }
}