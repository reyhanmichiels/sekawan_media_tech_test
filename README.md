## Project Description
<p>This project is a technical test for the Back End Developer Intern at Sekawan Media. This project is a vehicle renting application in the form of a REST API. Apart from renting, this application can also be used for vehicle monitoring and creating report files</p>

##  Tech Stack
* Programming Language -> PHP Version 8.1
* Framework -> Laravel Version 10
* Database -> MySQL Version Latest(Docker)
* Auth -> JWT

## How to use
<p>Before use this project, make sure you have docker and docker compose installed in your device</p>
<p><b>steps</b></p>

* Clone this repository to your device
* Configure your `.env`
* Run `docker compose -f docker-compose.yaml -f docker-compose-prod.yaml build` 
* Run `docker compose -f docker-compose.yaml -f docker-compose-prod.yaml up -d`
* Run `docker exec -it app_sm_tech_test /bin/bash'
* Inside docker container terminal, Run `php artisan migrate --seed`
<p>After that your app serve at localhost:8000</p>

## Docs
### Registration
Endpoint: localhost:8000/api/regist
JWT Token: Doesn't Need
Authorization: Need
Description: This endpoint is used for regist new user to application with role as driver
Pics here

### Login
Endpoint: localhost:8000/api/regist
Description: This endpoint is used for regist new user to application with role as driver
Pics here

### Logout
Endpoint: localhost:8000/api/regist
Description: This endpoint is used for regist new user to application with role as driver
Pics here
