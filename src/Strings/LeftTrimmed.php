<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify\Strings;

use ElegantBro\Interfaces\Stringify;
use ElegantBro\Stringify\Just;
use Exception;

final class LeftTrimmed implements Stringify
{
    /**
     * @var Stringify
     */
    private $str;

    /**
     * @var Stringify
     */
    private $chars;

    public static function defaultChars(Stringify $str): LeftTrimmed
    {
        return new LeftTrimmed(
            $str,
            new Just(" \t\n\r\0\x0B")
        );
    }

    public function __construct(Stringify $str, Stringify $chars)
    {
        $this->str = $str;
        $this->chars = $chars;
    }

    /**
     * @throws Exception
     */
    public function asString(): string
    {
        return ltrim(
            $this->str->asString(),
            $this->chars->asString()
        );
    }
}
