#!/bin/bash

docker rm -f projet-web projet-web-mysql projet-web-phpmyadmin
docker run --name projet-web-mysql -e MYSQL_ROOT_PASSWORD=root -v "$PWD/mysql":/var/lib/mysql -d mysql
docker run --name projet-web-phpmyadmin --link projet-web-mysql:db -d -p 8082:80 phpmyadmin/phpmyadmin
docker run -d --name projet-web --link projet-web-mysql:db -p 8081:80 -v "$(pwd)":/var/www/html/ custom_php
