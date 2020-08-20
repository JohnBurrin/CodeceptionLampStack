# Basic Lamp Stack

## Introduction
This lamp stack cloned from the sprintcube lamp stack, and has all the architecture you'll need for LAMP development.

The inital stack is cloned from https://github.com/sprintcube/docker-compose-lamp

In this version I've added the codeception test platform

https://codeception.com/quickstart

## Instructions

1. `git clone git@github.com:JohnBurrin/CodeceptionLampStack.git`
2. `cd CodeceptionLampStack`
3. `docker-compose build`
4. `docker-compose up -d`
5. `docker-compose exec webserver bash ``
6. `cd ../``
7. `composer install`
8. `php vendor/bin/codecept run --steps`


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
