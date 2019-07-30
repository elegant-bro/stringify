<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;


use Exception;
use JsonException;

final class JsonEncoded implements Stringify
{

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var int
     */
    private $options;

    /**
     * @var int
     */
    private $depth;

    public static function default($value): JsonEncoded
    {
        return new JsonEncoded($value, 0, 512);
    }

    public function __construct($value, int $options, int $depth)
    {
        $this->value = $value;
        $this->options = $options;
        $this->depth = $depth;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        if (false === $result = json_encode($this->value, $this->options, $this->depth)) {
            throw new JsonException(json_last_error_msg());
        }

        return $result;
    }
}