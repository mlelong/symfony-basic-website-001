# symfony-basic-website-001
 
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
How to see database users : ```bash docker-compose exec db mysql -uroot -ppassword -e 'SELECT User, Host, Password FROM mysql.user;'```
How to see database users : ```bash docker-compose exec db mysql -uroot -p -e 'SHOW DATABASES;'```






