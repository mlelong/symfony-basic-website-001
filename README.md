# symfony-basic-website-001
 
# Test Techhnique

Le test devra être livré via un repository github privé.
Les travaux devront pouvoir être testable sans aucune modification à apporter au code, ni paramètrage et si besoin en suivant pas a pas une documentation.
Nous vous demandons d'utiliser Symfony dans sa dernière version stable, de même que tous les outils dont vous aurez besoin.
​
Exercices à réaliser :
​
*ACT-TT1 :* Réaliser une page web qui affichera un échiquier. 

*ACT-TT2 :* Réaliser une commande qui prend en argument un chiffre n et retourne un tableau contenant une suite de Fibonacci de la longueur n. ***Tips** : Ne vous limittez pas à un copié / collé !

*ACT-TT3 :* Réaliser une modélisation d'un candidat, d'une annonce et d'une candidature en utilisant l'orm Doctrine et créer un service qui liste toutes les candidatures par annonce.

*ACT-TT4 :* Réaliser une suite de test unitaire pour les 3 premiers exercices. 
 
 
# installation

```bash
$ git clone https://github.com/mlelong/symfony-basic-website-001.git .
```

# running docker

```bash
$ docker-compose build
$ docker-compose up -d
```

# show databases & users

```bash
docker-compose exec db mysql -uroot -ppassword -e 'SHOW DATABASES;'
docker-compose exec db mysql -uroot -ppassword -e 'SELECT User, Host FROM mysql.user;'
```

# load symfony & fixtures

```bash
$ docker exec -it symfony-basic-website-001-app-1 bash
$ composer install;
$ php bin/console doctrine:migrations:migrate;
$ php bin/console doctrine:fixtures:load --env=dev;
```

# running command

```bash
$ docker exec -it symfony-basic-website-001-app-1 bash
$ php bin/console app:display-fibonacci-numbers 10
```

# running tests

```bash
$ docker exec -it symfony-basic-website-001-app-1 bash
$ php bin/console doctrine:schema:update --force --env=test;
$ php bin/console doctrine:fixtures:load --env=test;
$ php ./vendor/bin/phpunit;
```

# show some examples

Lets visit : 
```bash
http://localhost/chessboard/display
http://localhost/fibonacci/display/10
http://localhost/joboffers/display
http://localhost:8080/
```

# docker tips

How to see logs : ```bash docker logs --tail 50 --follow --timestamps symfony-basic-website-001-db-1```






