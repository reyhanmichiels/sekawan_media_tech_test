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

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/4fc18ff3-bbf1-4a1a-b8b8-c6a3e5b6003d)

### Login
<p>Endpoint: localhost:8000/api/login</p>
<p>JWT Token: Doesn't Need</p>
<p>Authorization: all role</p>
<p>Description: This endpoint is used for login to system, this endpoint return jwt token that you can use for endpoint that need authentication</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/eddb131b-6f98-4151-952c-86a71177c7c5)

### Logout
<p>Endpoint: localhost:8000/api/logout</p>
<p>JWT Token: Need</p>
<p>Authorization: all role</p>
<p>Description: This endpoint is used for logout from system, after log out, token that your have will be expired</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/7a3a388d-2a78-47f6-920e-b466b6aa5987)

### Create Rent
<p>Endpoint: localhost:8000/api/vehicles/{vehicleId}/rents</p>
<p>JWT Token: Need</p>
<p>Authorization: </p>
<p>Description: This endpoint is used for create new rent</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/2342d043-7c86-469b-b2af-20338d17665c)

### Approve Rent
<p>Endpoint: localhost:8000/api/rents/{rentId}/approve</p>
<p>JWT Token: Need</p>
<p>Authorization: pool_manager</p>
<p>Description: This endpoint is used for approve rent</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/71123aac-d5a4-4e53-8cb4-0b64755bdb57)

### Get Dashboards
<p>Endpoint: localhost:8000/api/dashboards</p>
<p>JWT Token: Need</p>
<p>Authorization: admin or pool_manager</p>
<p>Description: This endpoint is used for see dashboard</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/15c5ce58-8eb8-4421-8b34-e13d84a1bd52)

### Export
<p>Endpoint: localhost:8000/api/rents/export</p>
<p>JWT Token: Need</p>
<p>Authorization: admin or pool_manager</p>
<p>Description: This endpoint is used for get rent report with form excel</p>

![image](https://github.com/reyhanmichiels/sekawan_media_tech_test/assets/103521934/0f125d1f-2df0-47d2-b67e-4545ec21f2fc)


### Postman Docs
https://documenter.getpostman.com/view/25516509/2s9YRB1rNq

### Available User
| Email | Password | Role |
| --- | --- | --- |
| admin@test.com | password | admin |
| driver@test.com | password | driver |
| manager1@test.com | password | pool_manager |
| manager2@test.com | password | pool_manager |



