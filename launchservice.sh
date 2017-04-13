#!/bin/bash

service mysql start
cd /opt/test_db
mysql -uroot -proot < /opt/test_db/employees_partitioned.sql

service nginx start
cd /opt/app
uwsgi --ini /opt/app/app.ini &
chmod 666 /opt/app/app.sock
