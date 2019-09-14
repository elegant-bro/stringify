<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use Exception;

final class UUIDv4 implements Stringify
{
    /**
     * @var Stringify
     */
    private $value;

    public function __construct()
    {
        $this->value = new Cached(
            new FromCallable(
                static function () {
                    return sprintf(
                        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                        random_int(0, 0xffff),
                        random_int(0, 0xffff),
                        random_int(0, 0xffff),
                        random_int(0, 0x0fff) | 0x4000,
                        random_int(0, 0x3fff) | 0x8000,
                        random_int(0, 0xffff),
                        random_int(0, 0xffff),
                        random_int(0, 0xffff)
                    );
                }
            )
        );
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        return $this->value->asString();
    }
}
