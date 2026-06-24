# Mini Issue Tracker

Mini Issue Tracker është një aplikacion Laravel për menaxhimin e projekteve dhe issue-ve.

## Features

-   Project CRUD
-   Issue CRUD
-   Tag Management
-   Comments
-   Issue Filters
-   Many-to-Many Issue Tags

## Installation

git clone ...

cd mini-issue-tracker

composer install

cp .env.example .env

php artisan key:generate

## Database

Krijoni databazën:

mini_issue_tracker

Pastaj:

php artisan migrate --seed

## Run

php artisan serve

## Technologies

-   Laravel 13
-   MySQL
-   Bootstrap 5
