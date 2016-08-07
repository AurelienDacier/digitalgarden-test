A Symfony project created on August 5, 2016, 7:12 pm.

Specs:
- Symfony 3.1
- SqLite3

Environment set up:
1st step: install bundles and parameters
- composer install

2nd step: create database
- Run: php bin/console doctrine:database:create

3rd step: create table
- Run: php bin/console doctrine:schema:update --force

4th step: start symfony server
- php bin/console server:start


API link: /api/v1/adverts
