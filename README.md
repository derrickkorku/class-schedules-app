# Introduction
This repo is a proof of concept application to demonstrate using MongoDB with Laravel 9 
by the help of Jessengers Laravel MongoDB package 3.9. The application built is a 
Course Scheduling and Booking application. It maintains two user roles, instructor & member.

# Installing & Running

1. Clone repo into your local environment
2. Composer install and npm install all dependencies
3. Set up a MongoDB atlas instance or local instance of MongoDB
4. Setup application using mongodb connection and mongodb database as follows:
   DB_CONNECTION=mongodb
   DB_DATABASE={dbname}
   DB_URI={connection uri}
5. run artisan migrate --seed
6. run artisan serve & npm run dev
7. Login and explore application. Credentials:
   instructor: instructor@email.com/123
   member: member@email.com/123

8. Follow laravel guide on how to set your application up for queueing of jobs and emailing


# Laravel Concepts / Development Concepts Explored
1. Repository design pattern
2. Event driven architecture using Events and Observers
3. Declarative programming style using laravel model scope queries
4. Thin Controller architecture style and CRUDY by design
5. Enforce quick response time using jobs & queues
6. Access control using gates, policies & middleware
7. Data validation using Request Classes


Best Regards
