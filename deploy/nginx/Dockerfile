FROM wyveo/nginx-php-fpm:latest

# Define o diretório principal do container como o diretório do Nginx
WORKDIR /usr/share/nginx/

# Troca a configuração padrão do Nginx pela nossa
COPY ../nginx.conf /etc/nginx/conf.d/default.conf