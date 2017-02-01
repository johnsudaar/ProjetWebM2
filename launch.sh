#!/bin/bash

docker run -d --name projet-web -p 8081:80 -v "$PWD":/var/www/html/ php:apache
docker run --name projet-web-mysql -e MYSQL_ROOT_PASSWORD=rootpassword -v "$PWD/mysql":/var/lib/mysq -d mysql
