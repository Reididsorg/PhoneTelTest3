# PhoneTelTest3

BileMo is an API web service with aim to expose mobile phones catalog to different shops with privacy access.

## Development environment
PHP 8.0
MySQL 8.0.25
Symfony 5.3.3
Symfony server
Linux Ubuntu
Composer 1.11.99

## Installation

1. Clone Github repository
    - git clone https://github.com/Reididsorg/PhoneTelTest3.git

2. Install dependancies
    - composer install  
    You may alternatively need to run :
    - php composer.phar install  
    (Depending on how you installed Composer)

3. Clone '.env' file at root project and rename it '.env.local', in order to configure environment vars and make any adjustments you need.   
   Specifically : 'DATABASE_URL'.  
   Then, *override* any configuration you need there (instead of changing '.env' directly).
   
4. Generate SSL authentication keys
     - php bin/console lexik:jwt:generate-keypair

5. Setup the database and Install fixtures
    - bin/console doctrine:database:create (or manually create database)
    - bin/console doctrine:migrations:diff
    - bin/console doctrine:migrations:migrate
    - bin/console doctrine:fixtures:load

Open local website in web browser :)

Find API documentation at : http://yourAdressDomain.local/api/docs

## Codacy Badge
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/38ad940a7d2d467bb18fbe3ad77127cc)](https://www.codacy.com/gh/Reididsorg/PhoneTelTest3/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Reididsorg/PhoneTelTest3&amp;utm_campaign=Badge_Grade)
