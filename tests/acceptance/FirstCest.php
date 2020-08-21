<?php
use \Codeception\Util\HttpCode;
class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeInTitle('Homepage – Lincolnshire County Council');
    }

    public function coronaVirusUpdatesPage (AcceptanceTester $I) {
        $I->amOnPage('/');
        $I->amGoingTo('click the Coronavirus updates link');
        $I->click('Get advice and support');
        $I->amOnPage('/coronavirus-support-services');
        $I->seeInTitle('Coronavirus support and services – Lincolnshire County Council');
        $I->see('Coronavirus support and services');
    }

    public function search(AcceptanceTester $I) {
        $I->amOnPage('/');
        $I->amGoingTo('search for the word cathedral');
        $I->fillField('q', 'cathedral');
        $I->submitForm(['id' =>'js-search'], array('data' => array(
             'q' => 'cathedral'
        )));
        $I->seeResponseCodeIs(200);
        $I->see('You searched for "Cathedral".');
    }

    public function inYourAreaSearch(AcceptanceTester $I) {
        $I->amOnPage('/');
        $I->amGoingTo('put a postcode in the search box');
        $I->fillField('postcode', 'LN1 2UE');
        $I->submitForm('form', array('data' => array(
             'postcode' => 'LN1 2UE'
        )));
        $I->seeResponseCodeIs(200);
    }

    public function myAccount(AcceptanceTester $I) {
        $I->amOnPage('/');
        $I->amGoingTo('going to click the my account link');
        $I->click('My Account');
        $I->seeResponseCodeIs(200);
        $I->see('MyAccount');
    }

    public function myAccountIncorrectLogin(AcceptanceTester $I) {
        $I->amOnPage('/');
        $I->amGoingTo('going to click the my account link');
        $I->click('My Account');
        //$I->seeResponseCodeIs(200);
        $I->seeInTitle('MyAccount – Lincolnshire County Council');
        $I->click('Sign in');
        $I->amOnSubdomain('myaccount.lincolnshire');
        $I->amOnPage('/q/login');
        $I->seeInTitle('Sign in | Lincolnshire County Council');
        $I->submitForm('form', array('user' => array(
             '_username' => '',
             '_password' => ''
        )));
        $I->see('Incorrect email or password');
    }

}
