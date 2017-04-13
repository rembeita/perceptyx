#!/bin/bash

service mysql start
cd /opt/test_db
mysql -uroot -proot < /opt/test_db/employees_partitioned.sql

service nginx start
service php7.0-fpm start

tail -f /var/log/nginx/error.log
