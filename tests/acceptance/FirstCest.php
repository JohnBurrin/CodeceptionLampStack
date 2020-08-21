<?php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('LAMP STACK');
    }

    public function clickPhpInfoLink(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('phpinfo()');
        $I->seeInTitle('PHP 7.4.2 - phpinfo()');
    }

    public function testDBConnectionMysqli(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Test DB Connection with mysqli');
        $I->see('Success:');
    }

    public function testDBConnectionPdo(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Test DB Connection with PDO');
        $I->see('Looking good');
    }
}
