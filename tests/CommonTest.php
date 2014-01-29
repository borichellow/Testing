<?php

require dirname(__DIR__).'/config.php';
require_once dirname(__DIR__) . '/PHPUnit/Autoload.php';


class CommonTest extends PHPUnit_Extensions_SeleniumTestCase {

    function setUp() {
        $this->setBrowser(Config::BROWSER);
        $this->setBrowserUrl(Config::BASE_URL);
    }

    public function LogIn($user = "borichellow", $pass = "vfgfbz"){
        if($this->isElementPresent("//a[@href='/ru/logout/?user.logout=1']")){
            $this->clickAndWait("//a[@href='/ru/logout/?user.logout=1']");
        }
        $this->click("//div[@class='auth_links']/div/div/a[@onclick='ShowAuthForm()']");
        sleep(2);  //should be waitForElementPresent
        $this->type("//input[@id='user.auth.login']", $user);
        $this->type("//input[@id='user.auth.pass']" , $pass);
        $this->clickAndWait("//button[@class='small' and @type='submit']/div/div/p/span");
        $this->waitForElementPresent("//a[@href='/ru/logout/?user.logout=1']");
    }
}
