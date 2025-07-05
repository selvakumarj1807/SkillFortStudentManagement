# Use an official PHP image
FROM php:8.2-cli

# Install any PHP extensions you need (optional)
RUN docker-php-ext-install mysqli

# Set the working directory
WORKDIR /app

# Copy all project files into the container
COPY . .

# Expose port 10000 for Render
EXPOSE 10000

# Start PHP's built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
