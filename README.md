# **Cloud Storage API on Laravel**
###### Made by Morugar_
<br> 

### Example of CloudStorage API on Laravel.

- Required only Laravel and php 8.0 or greater

- Realization using Bearer token 

- Example of web-app that use this api you can find on 'web-app' branch

- Example of DB you can find on 'data' branch
------------ 
## How to start
 
### Run the API using following command:
> 'path to php' artisan serve

for example:

> C:/php8/php.exe artisan serve

or

> php artisan serve
---------------
## Requests

### Example of Request: 
> URL: https://localhost:8000/api/cowsay
>
>Method: <'Name of method | POST/GET/PATCH/DELETE'>
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - <'Parameter 1'> - string|required|min:3|max:16
>
> - <'Parameter 2'> - int|required|min:2|max:12
>
> - <'Parameter 3'> - bool|required

Response
>Successful

> Status: 200
>
>Content-Type: application/json
>Body: 
>
> - <'Parameter 1'> - string|required
------------
>Error

> Status: 422
>
>Content-Type: application/json
>Body: 
>
> - error {
> 
>code: 422, 
>
>message: 'Error', 
>
>errors: {
>
> <'key'>: <'array of errors'>
>
>    }
>
>}
---------------
#### Registration:
> URL: https://localhost:8000/api/register
>
>Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - login - string|required|min:3|max:16
>
> - email - string|required
>
> - password - string|required|min:6|max:32
---------------
#### Login: 
> URL: https://localhost:8000/api/login
>
>Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - login_or_email - string|required
>
> - password - string|required
---------------
