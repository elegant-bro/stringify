<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;
use Exception;

class Joined implements Stringify
{
    /**
     * @var Stringify[]
     */
    private $args;

    public static function strings(string ...$args): Joined
    {
        return new Joined(
            ...array_map(
                static function (string $s) {
                    return new Just($s);
                },
                $args
            )
        );
    }

    public function __construct(Stringify ...$args)
    {
        $this->args = $args;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return (new Imploded(
            new EmptyStr(),
            array_map(
                static function (Stringify $s) {
                    return $s->asString();
                },
                $this->args
            )
        ))->asString();
    }
}
