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
<p>Endpoint: localhost:8000/api/regist</p>
<p>JWT Token: Doesn't Need</p>
<p>Authorization: all role</p>
<p>Description: This endpoint is used for regist new user to application with role as driver</p>
Pics here

### Login
<p>Endpoint: localhost:8000/api/login</p>
<p>JWT Token: Doesn't Need</p>
<p>Authorization: all role</p>
<p>Description: This endpoint is used for login to system, this endpoint return jwt token that you can use for endpoint that need authentication</p>
Pics here

### Logout
<p>Endpoint: localhost:8000/api/logout</p>
<p>JWT Token: Need</p>
<p>Authorization: all role</p>
<p>Description: This endpoint is used for logout from system, after log out, token that your have will be expired</p>
Pics here

### Create Rent
<p>Endpoint: localhost:8000/api/vehicles/{vehicleId}/rents</p>
<p>JWT Token: Need</p>
<p>Authorization: </p>
<p>Description: This endpoint is used for create new rent</p>
Pics here

### Approve Rent
<p>Endpoint: localhost:8000/api/rents/{rentId}/approve</p>
<p>JWT Token: Need</p>
<p>Authorization: pool_manager</p>
<p>Description: This endpoint is used for approve rent</p>
Pics here

### Get Dashboards
<p>Endpoint: localhost:8000/api/dashboards</p>
<p>JWT Token: Need</p>
<p>Authorization: admin or pool_manager</p>
<p>Description: This endpoint is used for see dashboard</p>
Pics here

### Export
<p>Endpoint: localhost:8000/api/rents/export</p>
<p>JWT Token: Need</p>
<p>Authorization: admin or pool_manager</p>
<p>Description: This endpoint is used for get rent report with form excel</p>
Pics here

### Postman Docs
Link here

### Available User
pics here



