<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests\Strings;

use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\Strings\Replaced;
use Exception;
use PHPUnit\Framework\TestCase;

class ReplacedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'foobaz',
            (new Replaced(
                new Just('bar'),
                new Just('baz'),
                new Just('foobar')
            ))->asString()
        );
    }
}
