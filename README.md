
# Developer Test

## Given

- You have a loan application
  - The loan application has 2 borrowers
    - One borrower has a job
    - The other borrower has a job and a bank account

## Requirements

- Install a fresh copy of Laravel
- Create some simple database tables to represent the above scenario
  - By simple I mean just the basics of what's really needed for this exercise
  - For example, the borrower should have a name, but we don't need date of birth, social security number or contact information for this exercise
  - Though I would like to see the standard date fields as part of the design (ie. created, updated, deleted)
- Write a query (or queries) that shows the total annual income and bank account values for the application
- Expose an API end point to show the results of the query (or queries)
  - All output should be in JSON format
- Write a unit test on at least one method in the project
  - I'm deliberatly keeping this requirement vague to give you freedom to decide what to test and how
- Update this README file with any installation instructions needed so we can clone and run your code

## What I'm looking for

- Your general skill-set with PHP and MySQL
- Your general architecture skills
- How well you know your way around Laravel
- Your ability to write unit tests
- Coding style
- How well you adhere to the PSR standards
- Usage of design patterns in your code

## Finally...

Don't be afraid to get creative and have some fun!

##Summary

This application is using Laravel 8 for REST API as backend. mySQL as database.
Homestead as a development environment.
Authentication - App uses Laravel Passport for API token authentication.
#####Application's API consumers should specify their access token as a Bearer token in the Authorization header of their request.

#Test
PHP Unit PHPUnit 9.4.2
Run `phpunit` to run tests.

## Installation instructions
#####http://loanapp.test

`composer install` to bring up all dependencies

Run these artisan commands to setup the database

`php artisan migrate`
`php artisan passport:install`
`php artisan db:seed`
default password for all seeded users is "password"

## API endpoints (Example for few routes)

#### Authentication

`POST /api/register`
```
{
       "name": "test",
       "email": "test@test.com",
       "password": "test",
       "password": "test"
}
```
Response on success along with access_token
```
{
     "user": {
         "name": "test",
         "email": "test@test.com",
         "updated_at": "2020-10-26T20:11:46.000000Z",
         "created_at": "2020-10-26T20:11:46.000000Z",
         "id": 11
     },
     "access_token": "eyJ0eXAiOiuL...."
 }
```

`GET /api/login`

`GET /api/logout`

#### Users

`GET /api/users
`
GET all Users alongside their Jobs and Bank Accounts
(Only admin can view "/api/users" route. To simulate admin role we set any User with id = 1 to be Admin)

```
{
     "data": [
         {
             "id": 1,
             "name": "Timmothy Schaefer",
             "email": "bgibson@example.com",
             ....
             "bank_account": [
                 {
                     "id": 4,
                     "user_id": 1,
                     "account_id": "sRPzdP",
                     "account_type": "savings",
                     "balance": 11243,
                    ....
             "job": [
                 {
                     "id": 4,
                     "user_id": 1,
                     "title": "5906",
                     "description": "Nam Odio consequatur commodi.",
                    ...
                 },
                ]...
```


GET all Jobs for a User  
`api/user/{user_id}/jobs`

```{
     "data": [
         {
             "id": 1,
             "name": "Timmothy Schaefer",
             "email": "bgibson@example.com",
             ....
             "bank_account": [
                 {
                     "id": 4,
                     "user_id": 1,
                     "account_id": "sRPzdP",
                     "account_type": "savings",
                     "balance": 11243,
                    ....
             "job": [
                 {
                     "id": 4,
                     "user_id": 1,
                     "title": "5906",
                     "description": "Nam Odio consequatur commodi.",
                    ...
                 },
                ]...
```

GET all loans for the authenticated user
`GET /api/loan`
```$xslt
{
    "data": [
        {
            "id": 3,
            "user_id": 1,
            "amount": 88888,
            "description": "test123123",
            "created_at": "2020-10-26T08:06:20.000000Z",
            "updated_at": "2020-10-27T10:56:53.000000Z"
        },
        {
            "id": 6,
            ....
```
Create a loan resource
`POST /api/loan`
`amount` and `description` fields are required

`GET /api/loan/{loan_id}` to get single loan resource

Update a loan
`PUT /api/loan/{loan_id}` 

Delete a loan
`DELETE /api/loan/{loan_id}` 

GET All Bank Accounts for a User
`GET /api/user/{user_id}/bankaccount`
```$xslt
{
    "data": [
        {
            "user_id": 1,
            "account_id": "sRPzdP",
            "account_type": "savings",
            "balance": 11243,
            "bank_name": "Citigroup",
            "created_at": "2020-10-26T08:06:19.000000Z",
            "updated_at": "2020-10-26T08:06:19.000000Z"
        },
        {
            "user_id": 1,
            "account_id": "sNi5l7",
            "account_type": "checking",
            "balance": 17597,
            "bank_name": "BOFA",
            "created_at": "2020-10-26T08:06:19.000000Z",
            "updated_at": "2020-10-26T08:06:19.000000Z"
        }
    ],
    "meta": {
        "total_bank_account_balance": 28840
    }
}
```
