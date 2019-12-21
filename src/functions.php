<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use ElegantBro\Interfaces\Stringify;
use Exception;

/**
 * @param Stringify $stringify
 * @return string
 * @throws Exception
 */
function raw(Stringify $stringify): string
{
    return $stringify->asString();
}
