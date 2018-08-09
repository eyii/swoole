FROM dockerliweipei/xdebug:php7.0

#加文件
ENV GIT_ROOT  /var/www/html
ENV WEB /var/www/html

#vhost
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
WORKDIR /etc/apache2/sites-enabled/
RUN sed -i "s#DocumentRoot /var/www/html/public#DocumentRoot ${WEB}#" 000-default.conf

#组件
RUN apt-get install -y gcc g++  libiconv-hook-dev libxml2-dev  libcurl4-openssl-dev
RUN docker-php-ext-install zip  pcntl sockets  sysvmsg sysvsem sysvshm shmop soap  opcache  xmlrpc
RUN pecl install swoole &&docker-php-ext-enable swoole
RUN php --ri swoole

EXPOSE 80 90

