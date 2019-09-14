<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\HashAlgo;
use ElegantBro\Stringify\Hashed;
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
                HashAlgo::md5()
            ))->asString()
        );
    }
}
