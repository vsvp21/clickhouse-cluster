#!/bin/sh

docker-compose up -d --remove-orphans

docker-compose exec clickhouse-php-client php src/index.php
