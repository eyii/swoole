FROM dockerliweipei/xdebug:nginx7.1

#RUN cp server.ini-development /etc/server/server.ini

#组件
RUN apt-get install -y gcc g++  libiconv-hook-dev libxml2-dev  libcurl4-openssl-dev
RUN docker-php-ext-install zip  pcntl sockets  sysvmsg sysvsem sysvshm shmop soap  opcache  xmlrpc
#RUN docker-server-ext-disable rpath debug fileinfo
#RUN docker-server-ext-install  mysql pcre_regex mhash  libmysqlclient-dev  imap_ssl libjpeg8-dev libpng12-dev  fpm
RUN pecl install swoole &&docker-php-ext-enable swoole
RUN php --ri swoole
EXPOSE 80 91


