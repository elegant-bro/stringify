<?php declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;


use Exception;

interface Stringify
{
    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string;
}