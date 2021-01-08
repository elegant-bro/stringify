[![Build Status](https://travis-ci.com/elegant-bro/stringify.svg?branch=master)](https://travis-ci.com/elegant-bro/stringify)
[![Coverage Status](https://coveralls.io/repos/github/elegant-bro/stringify/badge.svg?branch=master)](https://coveralls.io/github/elegant-bro/stringify?branch=master)

# Work with strings in an elegant way

`Stringify` interface gives the ability to any objects to represent them as a string. This library contains the most useful functionality for string manipulation from PHP organized in objects. You can compose them in an elegant way.

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

Nothing special in the example above, where is magic?

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

This is a very simple example, but it reflects the common idea. By this approach, you can create some kind of query
builder but in an elegant declarative way.

## For contributors

**Pass all tests locally before creating the pull a request.**

Build the test container and run all tests
```shell
make all
```

Other commands
```shell
# build the Dockerfile
make build 

# install composer requirements
make install

# enter the container shell
make shell

# style check
make style-check

# run unit tests
make unit

# ensure coverage is 100%
make coverage
```
