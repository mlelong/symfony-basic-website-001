# create databases
CREATE DATABASE IF NOT EXISTS `app`;
CREATE DATABASE IF NOT EXISTS `app_test`;

# create root user and grant rights
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';

# create myuser user and grant rights
CREATE USER 'myuser'@'%' IDENTIFIED BY 'mypassword';
GRANT ALL PRIVILEGES ON `app`.* TO 'myuser'@'%';
GRANT ALL PRIVILEGES ON `app_test`.* TO 'myuser'@'%';