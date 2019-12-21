<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests\Hash;

use ElegantBro\Stringify\Hash\Algorithm;
use ElegantBro\Stringify\Hash\Hashed;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class HashedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'acbd18db4cc2f85cedef654fccc4a4d8',
            (new Hashed(
                new Just('foo'),
                Algorithm::md5()
            ))->asString()
        );
    }
}
