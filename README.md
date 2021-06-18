# Mini CRM 
> testing scaffolding 

## description 
Basically, project to manage companies and their employees. Mini-CRM.

## Manages 
- Companies 
- Employees

## Getting started
- run the commands in your termainl 
1. cp .env.example .env
1. vim .env 
1. press i in your keyboard
1. navigate into your database configs and change it to your locale database
1. press Esc then :x
1. run php artisan migrate --seed
1. php artisan storage link
1. you are ready to go now

## App Directory Structure
```
├───Console
├───Exceptions
├───Http
│   ├───Controllers
│   │   └───Auth
│   ├───Middleware
│   └───Requests
├───InterFaces
├───Models
├───Providers
└───Repositories
```