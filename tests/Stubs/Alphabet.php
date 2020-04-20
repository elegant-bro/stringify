<?php declare(strict_types=1);


namespace ElegantBro\Stringify\Tests\Stubs;


use ElegantBro\Interfaces\Arrayee;

final class Alphabet implements Arrayee
{
    /**
     * @var array
     */
    private $alphabet;

    public function __construct(array $alphabet)
    {
        $this->alphabet = $alphabet;
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->alphabet;
    }
}
