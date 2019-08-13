<?php
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

declare(strict_types=1);

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\Base64Encoded;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class Base64EncodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals('Zm9vYmFy', (new Base64Encoded(new Just('foobar')))->asString());
    }
}
