docker:=docker run --rm -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app -w /app elegant-bro/stringify:8.0

build:
	docker build --build-arg VERSION=8.0 --tag elegant-bro/stringify:8.0 ./docker/

exec:
	docker run --rm -ti -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app:rw -w /app elegant-bro/stringify:8.0 sh

install:
	$(docker) composer install

require:
	$(docker) composer require $(ARGS)

install-no-dev:
	$(docker) composer install --no-dev

style-check:
	$(docker) vendor/bin/ecs check src

unit:
	$(docker) -dzend_extension=xdebug.so -dxdebug.mode=coverage vendor/bin/phpunit

coverage:
	$(docker) php check-coverage.php coverage.xml 100

all: build install style-check unit coverage
