# symfony-basic-website-001
 
# installation

```bash
$ git clone https://github.com/mlelong/symfony-basic-website-001.git .
$ cd app;
$ composer install;
$ cd ..;
$ docker-compose build
```

# running docker

```bash
$ docker-compose up -d
```

# load fixtures

```bash
$ docker exec -it symfony-basic-website-001-app-1 bash
$ composer install;
$ php bin/console doctrine:migrations:migrate;
$ php bin/console doctrine:fixtures:load --env=dev;
```

# running command

```bash
$ php bin/console app:display-fibonacci-numbers 10
```

# running tests

```bash
$ php bin/console --env=test doctrine:database:create;
$ php bin/console --env=test doctrine:schema:create;
Maybe some privileges to give : "GRANT ALL PRIVILEGES ON database_test.* TO 'dbuser' WITH GRANT OPTION;"
$ php bin/console doctrine:fixtures:load --env=test;
$ php ./vendor/bin/phpunit;
```

# examples

Lets visit : 
```bash
http://localhost/chessboard/display
http://localhost/fibonacci/display/10
http://localhost/joboffers/display
http://localhost:8080/
```




