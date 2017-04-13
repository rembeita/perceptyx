#Base image
FROM ubuntu:16.04

#File Author / Maintainer
MAINTAINER Rodrigo Embeita

#Update Repo
RUN apt-get update

#Install mysql

# Install MySQL Server in a Non-Interactive mode. Default root password will be "root"
RUN echo "mysql-server-5.6 mysql-server/root_password password root" | debconf-set-selections
RUN echo "mysql-server-5.6 mysql-server/root_password_again password root" | debconf-set-selections

#Install packages
RUN apt-get -y install mysql-server-5.7 nginx git php-fpm php-mysql php-json
RUN apt-get -y install vim

#Clone repo and install database
RUN mkdir -p /opt/test_db
RUN mkdir -p /run/php
RUN git clone https://github.com/datacharmer/test_db /opt/test_db

#Configuring Nginx
RUN rm /etc/nginx/sites-enabled/default
COPY nginx/app /etc/nginx/sites-enabled/app

#Instaling App
COPY app /opt/app
#Copy launch script
COPY launchservice.sh /
RUN chmod +x /launchservice.sh


ENTRYPOINT ["/launchservice.sh"]
