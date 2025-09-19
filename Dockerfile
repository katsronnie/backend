# Use official PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Copy all project files to container
COPY . .

# Install required PHP extensions (if needed)
RUN docker-php-ext-install mbstring

# Expose port 10000
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
