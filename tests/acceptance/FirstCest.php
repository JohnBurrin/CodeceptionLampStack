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
//        $I->see('LAMP STACK');
        $I->seeInTitle('Google');
        $I->fillField('q', 'php');
        $I->click('btnK');
        $I->seeInTitle('php - Google Search');
        $I->see("PHP: Hypertext Preprocessor");
    }
}
