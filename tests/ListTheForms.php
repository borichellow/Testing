<?php
require_once 'CommonTest.php';

class ListTheForms extends CommonTest
{
    function setUp() {
        $this->setBrowser(Config::BROWSER);
        $this->setBrowserUrl(Config::BASE_URL);
    }
    
    function ListAssertetion(){
        $this->assertElementPresent("//form[@id='formaction']");
        $i = 2;
        while ($this->isElementPresent("//form[@id='formaction']/table/tbody/tr[".$i."]")){
            $this->assertElementPresent("//form[@id='formaction']/table/tbody/tr[2]/td[2]/input");
            $this->assertElementPresent("//form[@id='formaction']/table/tbody/tr[2]/td[3]/a");
            $this->assertElementPresent("//form[@id='formaction']/table/tbody/tr[2]/td[8]/div/a[@class='btnCopy']");
            $this->assertElementPresent("//form[@id='formaction']/table/tbody/tr[2]/td[8]/div/a[@class='btnTrash']");
            $i++;
        }
        $this->assertElementPresent("//div[@class='formsActionsBt']");
    }
    
    function testFormsList(){
        $this->open();
        $this->LogIn();
        $this->clickAndWait("//div[@class='mainMenu']/a[2]");
        $this->ListAssertetion();
    }

}
?>
