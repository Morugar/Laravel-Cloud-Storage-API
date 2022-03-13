# **Cloud Storage API on Laravel**
###### Made by Morugar_
<br> 

### Example of CloudStorage API on Laravel.

- Required only Laravel and php 8.0 or greater

- Realization using tokens auth

- Example of web-app that use this api you can find on 'web-app' branch

 - Dump of DB and Postman Collection you can find in 'data' folder

 ### In future, I have a plan to make realization using Bearer Tokens.
 ### This API was made in hurry, so it can have some shortcomings
------------ 
## How to start
 
### Run the API using following command:
> 'path to php' artisan serve

for example:

> C:/php8/php.exe artisan serve

or

> php artisan serve

### You also need to start a server with database on it.
### Configure DB in '.env' or in 'config/database.php'
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
> - login - string|required
>
> - email - string|required
>
> - password - string|required|min:5
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
> - login - required
>
> - password - required
Response
>Successful

> Status: 200
>
>Content-Type: application/json
>Body: 
>
> - api_token = 'user token'
---------------
### Folder creation: 
> URL: https://localhost:8000/api/folder 
>
> Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - name - string|required
>
> - api_token - required 
---------------
### Folder share: 
> URL: https://localhost:8000/api/share 
>
> Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - user_id - required
>
> - folder_id - required
>
> - api_token - required 
---------------
### Folder view: 
> URL: https://localhost:8000/api/folder/{folder_id} 
>
> Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - folder_id - required
>
> - api_token - required 
---------------
### File creation: 
> URL: https://localhost:8000/api/folder/{folder_id}/file 
>
> Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - name - required
>
> - file - required
>
> - api_token - required 
---------------
### File download: 
> URL: https://localhost:8000/api/download
>
> Method: POST
>
> Headers: 
> 
> - Content-Type: application/json
> 
> Body: 
>
> - file_id = required
>
> - api_token - required 
---------------