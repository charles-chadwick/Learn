# Learn

A learning management system to help me train on Laravel and Vue. 

## Installation

Install the usual things via package managers, and get the database set up. 

``composer install``

``npm install``

``php artisan migrate``

``php artisan db:seed``


## Usage

So far I'm not bothering with developing this in a container. It's just SQLite and php's built-in
web server. Run the following commands to get set up. Run these in a terminal.

``php artisan serve``

``npm run dev``

If the UI has not been fully developed yet, you can go to this URL to see the lessons: 
http://localhost:8000/lessons/

The localhost:8000 may change based on your ``php artisan serve`` command. Pay attention to that output. 