# silex_demo

## install
- clone repository
- update dependencies:
```
composer install
```
###database
- create database called "silex_demo"
- update config/params.neon with you DB settings
- update phinx.yml with your DB settings
- init the database tables:
```
./vendor/bin/phinx migrate -e DEVELOPMENT
```
