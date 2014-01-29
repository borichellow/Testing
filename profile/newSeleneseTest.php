<?php

set_include_path(get_include_path() . PATH_SEPARATOR . './PEAR/');
require_once 'Testing/Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class SearchTest extends PHPUnit_Framework_TestCase
{
    private $selenium;
    private $icon_xpath;
    public function setUp()
    {
        $this->selenium = new Testing_Selenium("*firefox", "http://depositphotos.com");
        $this->selenium->start();
    }

    public function tearDown()
    {
        $this->selenium->stop();
    }

    public function testName()
    {
       
    }

}
?>
