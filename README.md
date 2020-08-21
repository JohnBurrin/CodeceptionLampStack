# Basic Lamp Stack

## Introduction
This lamp stack cloned from the sprintcube lamp stack, and has all the architecture you'll need for LAMP development.

The inital stack is cloned from https://github.com/sprintcube/docker-compose-lamp

In this version I've added the codeception test platform

I wanted a php container that I could use to write automated acceptace tests for a remote host, the whole stack is overkill really for what I need it to do.

The sample test loads the google home page in headless chrome browser and tests the Google search page by searching for `php`,

https://codeception.com/quickstart

This branch specifically tests a remote website.

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
FirstCest: Frontpage works
Signature: FirstCest:frontpageWorks
Test: tests/acceptance/FirstCest.php:frontpageWorks
Scenario --
 I am on page "/"
 I see in title "Homepage – Lincolnshire County Council"
 PASSED

FirstCest: Corona virus updates page
Signature: FirstCest:coronaVirusUpdatesPage
Test: tests/acceptance/FirstCest.php:coronaVirusUpdatesPage
Scenario --
 I am on page "/"
 I am going to click the Coronavirus updates link
 I click "Get advice and support"
 I am on page "/coronavirus-support-services"
 I see in title "Coronavirus support and services – Lincolnshire County Council"
 I see "Coronavirus support and services"
 PASSED

FirstCest: Search
Signature: FirstCest:search
Test: tests/acceptance/FirstCest.php:search
Scenario --
 I am on page "/"
 I am going to search for the word cathedral
 I fill field "q","cathedral"
 I submit form {"id":"js-search"},{"data":{"q":"cathedral"}}
 I see "You searched for "Cathedral"."
 PASSED

FirstCest: In your area search
Signature: FirstCest:inYourAreaSearch
Test: tests/acceptance/FirstCest.php:inYourAreaSearch
Scenario --
 I am on page "/"
 I am going to put a postcode in the search box
 I fill field "postcode","LN1 2UE"
 I submit form {"xpath":"//*[@id="content"]/div/div[3]/div/div/div/div/div[2]/form"},{"data":{"postcode":"LN1 2UE"}}
 I see response code is 200
 FAIL

FirstCest: My account
Signature: FirstCest:myAccount
Test: tests/acceptance/FirstCest.php:myAccount
Scenario --
 I am on page "/"
 I am going to going to click the my account link
 I click "My Account"
 I see "MyAccount"
 PASSED

FirstCest: My account incorrect login
Signature: FirstCest:myAccountIncorrectLogin
Test: tests/acceptance/FirstCest.php:myAccountIncorrectLogin
Scenario --
 I am on page "/"
 I am going to going to click the my account link
 I click "My Account"
 I see in title "MyAccount – Lincolnshire County Council"
 I click "Sign in"
 I am on subdomain "myaccount.lincolnshire"
 I am on page "/q/login"
 I see in title "Sign in | Lincolnshire County Council"
 I submit form "form",{"user":{"_username":"","_password":""}}
 I see "Incorrect email or password"
 PASSED


```

## Configuration

The .env file you created in step 9 contains all the usernames and passwords for the MySQL service

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


## tests

See the documentation at https://codeception.com/quickstart for morinformation on testing with CodeceptionLampStack

## Run tests

Remember you need to be in the `/var/www` folder
`php vendor/bin/codecept run --steps`
