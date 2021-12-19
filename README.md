# Docker Keycloak Example

Basic SSO example using NGINX + Keycloak [DB] + Application

This is a fork of original repo:
https://github.com/firmanJS/sso-keycloak-php

## Test Running Application

```sh
docker-compose up
```

See `.env` file to see environment variables used in docker compose.

## Keycloak 

Admin console:

* http://localhost/auth/admin/master/console

Login with username and password:
```txt
username: admin
password: password
```

Keycloak is configured with a **demo** realm importing this file: `keycloak/realm.json`

## Service App page

Service application page is:

http://localhost/


To access service app HTML page you need to register (use register link at bottom) in demo realm before:
http://localhost/auth/realms/demo-realm/account

Once you are registered and after successful login the service app
should show you the parsed token and a simple "logout" button (redirecting to login page).

## Delete

Delete all containers and volumes:

```bash
docker-compose down -v
```
