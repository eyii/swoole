FROM dockerliweipei/xdebug:php7.1

#加文件
ENV GIT_ROOT  /var/www/html
ENV WEB /var/www/html
#权限

#vhost
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
WORKDIR /etc/apache2/sites-enabled/
RUN sed -i "s#DocumentRoot /var/www/html/public#DocumentRoot ${WEB}#" 000-default.conf
#RUN cp server.ini-development /etc/server/server.ini

#组件
RUN apt-get install -y gcc g++  libiconv-hook-dev libxml2-dev  libcurl4-openssl-dev
RUN docker-php-ext-install zip  pcntl sockets  sysvmsg sysvsem sysvshm shmop soap  opcache  xmlrpc
#RUN docker-server-ext-disable rpath debug fileinfo
#RUN docker-server-ext-install  mysql pcre_regex mhash  libmysqlclient-dev  imap_ssl libjpeg8-dev libpng12-dev
RUN pecl install swoole &&docker-php-ext-enable swoole
RUN php --ri swoole
EXPOSE 80 91


