<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;


final class Base64Encoded implements Stringify
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
        return base64_encode($this->value);
    }
}