# PhoneTelTest3

Snowtricks is a community website, with aim to popularize and learn snowboard by sharing snowboard tricks.

## Development environment
PHP 8.0
MySQL 8.0.25
Symfony 5.3.3
Symfony server
Linux Ubuntu
Composer 1.11.99

## Installation

1. Clone Github repository
    - git clone https://github.com/Reididsorg/PhoneTelTest1.git

2. Install dependancies
    - composer install
      You may alternatively need to run :
- php composer.phar install
  (Depending on how you installed Composer)

3. Clone '.env' file at root project and rename it '.env.local', in order to configure environment vars and make any adjustments you need - specifically
   'DATABASE_URL'.
   Then, *override* any configuration you need there (instead of changing '.env' directly).

4. Setup the database and Install fixtures
    - bin/console doctrine:database:create (or manually create database)
    - bin/console doctrine:migrations:diff
    - bin/console doctrine:migrations:migrate
    - bin/console doctrine:fixtures:load

Open local website in web browser :)

## Codacy Badge