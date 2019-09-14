<?php

namespace ElegantBro\Stringify\Tests;

use ElegantBro\Stringify\FromCallable;
use Exception;
use PHPUnit\Framework\TestCase;

final class FromCallableTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            'test',
            (new FromCallable(
                static function () {
                    return 'test';
                }
            ))->asString()
        );
    }
}
