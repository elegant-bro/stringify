[![Build Status](https://travis-ci.com/elegant-bro/stringify.svg?branch=master)](https://travis-ci.com/elegant-bro/stringify)
# Work with strings in elegant way

`Stringify` interface gives ability to any objects to represent them as string. This library contains the most useful 
functionality for string manipulation from PHP organized in objects. You can compose them in elegant way.

## Examples

Suppose you create some abstraction to execute sql queries:
```php
<?php

use ElegantBro\Stringify\Stringify;

interface Connection
{
    public function execute(Stringify $query, array $params): void;
}
```

then you can use it like this:
```php
<?php

use ElegantBro\Stringify\Just;

// Let's change user's (which id is 10) first name to Jonh
$connection->execute(
    new Just('UPDATE users SET first_name = ? WHERE id = ?'),
    ['John', 10]
);
```

Nothing special in example above, where is magic?

```php
<?php

use ElegantBro\Stringify\Stringify;
use ElegantBro\Stringify\Imploded;
use ElegantBro\Stringify\Joined;
use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\Formatted;

final class UpdateQuery implements Stringify
{
    private $table;
    private $fields;
    
    public function __construct(string $table, array $fields) 
    {
        $this->table = $table;
        $this->fields = $fields;
    }
    
    public function asString(): string
    {
        return 
            (new Joined(
                new Formatted(new Just('UPDATE %s SET '), $this->table),
                new Imploded(
                    new Just(' '),
                    array_map(
                        static function (string $field) { return $field.' = ?'; },
                        $this->fields
                    )
                )
            ))->asString();
    }
}
```

Now we can use it easily
```php
<?php

$connection->execute(
    new UpdateQuery('users', ['first_name']),
    ['John']
);
```

Hey, what about where?!

```php
<?php

use ElegantBro\Stringify\Stringify;
use ElegantBro\Stringify\Imploded;
use ElegantBro\Stringify\Joined;
use ElegantBro\Stringify\Just;

final class Where implements Stringify
{
    private $origin;
    
    private $fields;
    
    public function __construct(Stringify $query, array $fields)
    {
        $this->origin = $query;
        $this->fields = $fields;
    }
    
    public function asString(): string
    {
        return 
            (new Joined(
                $this->origin,
                new Just(' WHERE '),
                new Imploded(
                    new Just(' '),
                    array_map(
                        static function (string $field) { return $field.' = ?'; },
                        $this->fields
                    )
                ) 
            ))->asString();
    }
}
```
Thats it
```php
<?php

$connection->execute(
    new Where(
        new UpdateQuery('users', ['first_name']),
        ['id']
    ),
    ['John', 10]
);
```

This is very simple example but it reflects the common idea. By this approach you can create some kind of query
builder but in elegant declarative way.

#Tests
Install dependencies

`docker run --rm -ti -v $PWD:/app composer install`

Run tests

`docker run --rm -ti -v $PWD:/app -w /app php:7.1-cli-alpine vendor/bin/phpunit`
