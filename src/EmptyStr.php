<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;

final class EmptyStr implements Stringify
{
    /**
     * @return string
     */
    public function asString(): string
    {
        return '';
    }
}
