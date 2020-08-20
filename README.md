# Basic Lamp Stack

## Introduction
This lamp stack cloned from the sprintcube lamp stack, and has all the architecture you'll need for LAMP development.

The inital stack is cloned from https://github.com/sprintcube/docker-compose-lamp

In this version I've added the codeception test platform

I wanted a php container that I could use to write automated acceptace tests for a remote host, the whole stack is overkill really for what I need it to do.

THe sample test loads the google home page in headless chrome browser and tests the title

https://codeception.com/quickstart

## Instructions

1. `git clone git@github.com:JohnBurrin/CodeceptionLampStack.git`
2. `cd CodeceptionLampStack`
3. `docker-compose build`
4. `docker-compose up -d`
5. `docker-compose exec webserver bash `
6. `cd ../`
7. `cp sample.env .env`
8. `composer install`
9. `php vendor/bin/codecept run --steps`


```
FirstCest: Try to test
Signature: FirstCest:tryToTest
Test: tests/acceptance/FirstCest.php:tryToTest
Scenario --
 PASSED

FirstCest: Frontpage works
Signature: FirstCest:frontpageWorks
Test: tests/acceptance/FirstCest.php:frontpageWorks
Scenario --
 I am on page "/"
 I see in title "Google"
 PASSED
```

## Configuration

The .evn file you created in step 9 contains all the usernames and passwords for the MySQL service

The file acceptance.suite.xml in the tests folder controls the base url of the testing host, if you want to test Localhost then the base url must be `http://app` because this is the internal name of the host so the test browser container can see it.



## Containers

The build consistis of the following containers

| Service             | Name         | Bash Command                          |   |   |
|---------------------|--------------|---------------------------------------|---|---|
| lamp-database       | database     | docker-compose exec database bash     |   |   |
| lamp-php74          | webserver    | docker-compose exec webserver bash    |   |   |
| lamp-phpmyadmin     | phpmyadmin   | docker-compose exec phpmyadmin bash   |   |   |
| lamp-redis          | redis        | docker-compose exec redis bash        |   |   |
| lamp_test-browser_1 | test-browser | docker-compose exec test-browser bash |   |   |
