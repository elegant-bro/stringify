<?php

declare(strict_types=1);
/**
 * @author Pavel Stepanets <pahhan.ne@gmail.com>
 * @author Artem Dekhtyar <m@artemd.ru>
 */

namespace ElegantBro\Stringify;

use Exception;
use RuntimeException;

final class NotEmptyStr implements Stringify
{
    /**
     * @var Stringify
     */
    private $origin;

    public function __construct(Stringify $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function asString(): string
    {
        if ('' === $this->origin->asString()) {
            throw new RuntimeException('String must\'nt be empty!');
        }

        return $this->origin->asString();
    }
}
