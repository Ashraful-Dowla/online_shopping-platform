# ![Laravel Example App](logo.png)



## About Online Shopping Platform

Online Shopping Platform named OSP which sells different products under different categories.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation]

Clone the repository

    git clone git@github.com:Ashraful-Dowla/online_shopping_platform.git

Switch to the repo folder

    cd online_shopping_platform

Install all the dependencies using composer

    composer install

Install all the dependencies using npm

    npm install && npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
