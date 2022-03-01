#!/bin/sh

# ********************************************
# RUN THIS SECTION ONLY IN PRODUCTION MACHINE
# ********************************************

# Install web server packages
sudo echo "deb [trusted=yes] https://apt.fury.io/meilisearch/ /" > /etc/apt/sources.list.d/fury.list;
sudo add-apt-repository ppa:ondrej/php;
sudo apt update;
sudo apt install -y composer npm git php-mbstring php-xml php-fpm php-zip php-intl php-gd php-common php-fpm php-cli unzip curl php-curl nginx supervisor;
sudo apt install -y mysql-server php-mysql;

# Clone repository (Production only)
git clone https://github.com/elvisblanco1993/voicebits.git;

# Database Server Setup
sudo mysql_secure_installation;
sudo mysql -u root -p;

# Create DB and set DB user privileges
CREATE DATABASE onboard;
CREATE USER 'onboard'@'localhost' IDENTIFIED BY 'Bahia#9398!!';
ALTER USER 'onboard'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Bahia#9398!!';
GRANT ALL PRIVILEGES ON onboard.* to 'onboard'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit;

# Setting Folder Permissions
sudo chgrp -R elvis . ;
sudo chown -R elvis storage;
sudo chown -R elvis bootstrap/cache;
chmod -R 775 ./storage;
chmod -R 775 bootstrap/cache;

composer install && composer update;
npm install && npm update;

# Create Nginx File
sudo nano /etc/nginx/sites-available/onboard

# File content starts here
server {
    listen 81;
    server_name momo.local; # Edit this
    root /home/elvis/Projects/student-onboarding-app/public; # Edit this

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock; # Replace with correct PHP version information
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    client_max_body_size 256M;
}

# File content ends here

# Enable NGINX Site
sudo ln -s /etc/nginx/sites-available/onboard /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default;

# Restart Nginx Server
sudo systemctl restart nginx;

# Setup Horizon Supervisor Process Manager
sudo nano /etc/supervisor/conf.d/horizon.conf

#Add this
[program:horizon]
process_name=%(program_name)s
command=php /home/cescuser/voicebits/artisan horizon
autostart=true
autorestart=true
user=cescuser
redirect_stderr=true
stdout_logfile=/home/cescuser/voicebits/horizon.log
stopwaitsecs=3600


# Update Supervisor config and reload
sudo supervisorctl reread;
sudo supervisorctl update;
sudo supervisorctl start horizon;

# Make sure the search engine is running
meilisearch;

# Migrate database
php artisan migrate:fresh;

# Activate the Stripe client for development (requires Stripe-Cli)
stripe listen --forward-to localhost/stripe/webhook





