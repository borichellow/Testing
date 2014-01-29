<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
set_include_path(get_include_path().PATH_SEPARATOR.'/PEAR/');
require_once 'PHPUnit/Framework/TestCase.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

/**
 * Description of newSeleneseTest
 *
 * @author ps
 */
/*class newSeleneseTest extends PHPUnit_Extensions_SeleniumTestCase {

    private $selenium;
    
    public function setUp() {
        //$this->setBrowser("*firefox");
        //$this->setBrowserUrl("http://localhost/");
        $this->selenium = new Testing_Selenium("*firefox","http://depositphotos.com");
        $this->selenium->start();
    }
    
    public function tearDown(){
        $this->selenium->stop();
    } 
    public function testMyTestCase() {
        $this->selenium->open("/");
    }

}*/


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

/**
 * Description of newSeleneseTest
 *
 * @author ps
 */
class newSeleneseTest extends PHPUnit_Extensions_SeleniumTestCase {

    function setUp() {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://depositphotos.com");
    }

    function testMyTestCase() {
        $this->open("/");
        $this->click("//input[@class='d_button d_xxl d_green']");
        $this->waitForPageToLoad("30000");
    }
    
    public function testBoris(){
        $this->open("/");
        
    }
}



?>
<?php /*

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://depositphotos.com/");
    $this->open("/");
    $this->waitForPageToLoad("15000");
    if($this->isElementPresent("//a[@class='d_item d_logout']")==false)
    {
    $this->click("//a[@class='d_item d_logout']");
    $this->waitForPageToLoad("30000");
    $this->waitForPageToLoad("10000");
    }
    $this->click("//input[@class='d_button d_xxl d_green']");
    $this->waitForPageToLoad("30000");
    $this->click("//input[@id='check-1-o']");
    $this->click("//div[@class='d_submit']/input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->select("id=asfl-e1", "index=8");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->select("id=asfl-e1", "index=15");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->select("id=asfl-e1", "index=5");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("id=radio-1-2");
    $this->click("//input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("id=radio-1-3");
    $this->click("//input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->select("id=asfl-e4", "index=4");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->select("id=asfl-e5", "index=4");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("id=check-1-6");
    $this->click("//input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("id=check-1-6");
    $this->click("//input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->select("css=select", "index=3");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->type("id=d_search3", "depositphotos");
    $this->click("//input[@class='d_button d_green d_m btn_gr']");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("css=#d_lang_slidable > span");
    $this->waitForPageToLoad("3000");
    $this->click("css=span.d_lang_flag.d_de");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("css=#d_lang_slidable > span");
    $this->waitForPageToLoad("3000");
    $this->click("css=span.d_lang_flag.d_se");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->type("name=username", "safonov_boris");
    $this->type("name=password", "vfgfbz");
    $this->click("//input[@class='d_button d_m d_loading']");
    $this->waitForPageToLoad("10000");
    $this->assertTrue($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='checked']"));
    $this->click("//a[@class='d_item d_logout']");
    $this->waitForPageToLoad("30000");
    $this->click("//input[@class='d_button d_xxl d_green']");
    $this->waitForPageToLoad("30000");
    $this->assertFalse($this->isElementPresent("//div[@class='custom-checks'][1]/label[@class='']"));
    $this->click("css=#d_lang_slidable > span");
    $this->click("css=span.d_lang_flag.d_en");
    $this->waitForPageToLoad("30000");
  }
}*/
?>