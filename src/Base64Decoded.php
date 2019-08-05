<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;


use InvalidArgumentException;

final class Base64Decoded implements Stringify
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function asString(): string
    {
        if (false === $res = base64_decode($this->value, true)){
            throw new InvalidArgumentException('The input contains character from outside the base64 alphabet');
        }

        return $res;
    }
}