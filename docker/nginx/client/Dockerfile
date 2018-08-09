FROM dockerliweipei/xdebug:nginx7.1

ENV WEB /var/www/html

#vhost


#组件
RUN apt-get install -y gcc g++  libiconv-hook-dev libxml2-dev  libcurl4-openssl-dev
RUN docker-php-ext-install zip  pcntl sockets  sysvmsg sysvsem sysvshm shmop soap  opcache  xmlrpc
RUN pecl install swoole &&docker-php-ext-enable swoole
RUN php --ri swoole

EXPOSE 80 90

