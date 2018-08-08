FROM dockerliweipei/xdebug:php7.1

#加文件
ENV GIT_ROOT  /var/www/html
ENV WEB  GIT_ROOT
#权限
WORKDIR ${WEB}
#vhost

RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
WORKDIR /etc/apache2/sites-enabled/
RUN sed -i "s#DocumentRoot /var/www/html/public#DocumentRoot ${WEB}#" 000-default.conf
#RUN cp server.ini-development /etc/server/server.ini

RUN apt-get install -y gcc g++  libiconv-hook-dev libxml2-dev  libcurl4-openssl-dev
RUN docker-php-ext-install zip  pcntl sockets  sysvmsg sysvsem sysvshm shmop soap  opcache  xmlrpc http2 coroutine
#RUN docker-server-ext-disable rpath debug fileinfo
#RUN docker-server-ext-install  mysql pcre_regex mhash  libmysqlclient-dev  imap_ssl libjpeg8-dev libpng12-dev  fpm
RUN pecl install swoole &&docker-php-ext-enable swoole

RUN php --ri swoole
ADD ./tools/tcp_server.php /root/tcp_server.php

EXPOSE 80 9503
CMD php /root/tcp_server.php
