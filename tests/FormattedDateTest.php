<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Tests;


use DateTimeImmutable;
use DateTimeZone;
use ElegantBro\Stringify\FormattedDate;
use ElegantBro\Stringify\Just;
use Exception;
use PHPUnit\Framework\TestCase;

class FormattedDateTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            '2000-01-02T13:23:45+00:00',
            (new FormattedDate(
                new DateTimeImmutable('2000-01-02 13:23:45', new DateTimeZone('UTC')),
                new Just(DATE_ATOM)
            ))->asString()
        );
    }
}