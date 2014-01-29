<?php
require_once 'CommonTest.php';
include_once dirname(__DIR__)."/UIMap/UIMAP_CreateFormPage.php";

class CreateForm extends CommonTest
{
    function setUp() {
        $this->setBrowser(Config::BROWSER);
        $this->setBrowserUrl(Config::BASE_URL);
    }
    /*
     * Asserting that all elementp present on page
     */
    function FormAsseretion(){
        $creat = new UIMAP_createFormPage();
        
        $this->assertElementPresent($creat->formName());
        $this->assertElementPresent($creat->formLanguige());
        for($i = 1; $i < 4; $i++){
            $this->assertElementPresent($creat->formRespuniqtype($i));
        }
        $this->assertElementPresent($creat->submitButton());
    }
    
    function CreateNewForm(){
        $creat = new UIMAP_createFormPage();

        $this->clickAndWait("//div[@class='mainMenu']/a[@href='/ru/myforms/create/']");
        $this->FormAsseretion();
        $formNamePre = "test_form#".  mt_rand(1, 999999);
        $this->type($creat->formName(), $formNamePre);
        if(!($this->isElementPresent($creat->formLanguige()."/option[@value='9' and @selected='']"))){
            $this->select($creat->formLanguige(), "index=1");
        }
        $this->click($creat->formRespuniqtype(mt_rand(1, 3)));
        $this->clickAndWait($creat->submitButton());
        $formNamePost = $this->getText("//div[@id='el-1']/div/h1/span");
        $this->assertTrue($formNamePost == $formNamePre);
    }
            
    function testCreateFormInLogout(){
        $this->open();
        $this->clickAndWait("//div[@class='mainMenu']/a");
        $this->CreateNewForm();
        
        $this->open();
        $this->clickAndWait("//div[@class='main_title']/div[@class='button big']/div/div/h2/span");
        $this->CreateNewForm();
    }
    
    function testCreateFormInLogin(){
        $this->open();
        $this->LogIn();
        $this->clickAndWait("//div[@class='logo']/a");
        $this->clickAndWait("//div[@class='mainMenu']/a");
        $this->CreateNewForm();
        
        $this->open();
        $this->LogIn();
        $this->clickAndWait("//div[@class='logo']/a");
        $this->clickAndWait("//div[@class='main_title']/div[@class='button big']/div/div/h2/span");
        $this->CreateNewForm();
        
        $this->open();
        $this->LogIn();
        $this->clickAndWait("//div[@class='mainMenu']/a[2]");
        $this->clickAndWait("//div[@class='formsActionsBt'][2]");
        $this->CreateNewForm();
    }
    
}

?>
