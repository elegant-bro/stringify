<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;


use Exception;

final class RightTrimmed implements Stringify
{
    /**
     * @var Stringify
     */
    private $str;

    /**
     * @var Stringify
     */
    private $chars;

    public static function defaultChars(Stringify $str): RightTrimmed
    {
        return new RightTrimmed(
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
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return rtrim(
            $this->str->asString(),
            $this->chars->asString()
        );
    }
}