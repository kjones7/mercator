FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    gnupg \
    unixodbc-dev

# Add Microsoft repo for SQL Server driver
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list

# Install SQL Server drivers
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql17 \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Set working directory
WORKDIR /var/www/html
