<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests\Strings;

use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\Strings\Joined;
use Exception;
use PHPUnit\Framework\TestCase;

class JoinedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'foobar',
            (new Joined(
                new Just('fo'),
                new Just('ob'),
                new Just('ar')
            ))->asString(),
            'Primary constructor'
        );

        $this->assertEquals(
            'foobar',
            Joined::strings('fo', 'ob', 'ar')->asString(),
            'strings constructor'
        );
    }
}
