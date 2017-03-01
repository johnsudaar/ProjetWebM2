#!/bin/bash

docker rm -f projet-web projet-web-mysql projet-web-phpmyadmin
docker run -d --name projet-web -p 8081:80 -v "$PWD":/var/www/html/ php:apache
docker run --name projet-web-mysql -e MYSQL_ROOT_PASSWORD=root -v "$PWD/mysql":/var/lib/mysq -d mysql
docker run --name projet-web-phpmyadmin --link projet-web-mysql:db -d -p 8082:80 phpmyadmin/phpmyadmin
