# Kiptok Backend

## Getting started
```
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```


### Notes
```
php bin/console cache:clear

php bin/console make:migration
php bin/console doctrine:schema:drop --force --full-database
php bin/console doctrine:database:drop --force
php bin/console doctrine:schema:create

php bin/console make:entity

```  
Run php cli on Hoster  
```/opt/php80f/bin/php composer.phar install```