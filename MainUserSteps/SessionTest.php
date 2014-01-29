<?php
require_once 'CommonMainTest.php';
include_once dirname(__DIR__).'/UIMap/UIMAP_MainPage.php';
include_once dirname(__DIR__).'/UIMap/UIMAP_PopupRegistreit.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SessionTest extends CommonMainTest {
    
    function setUp() {
        $this->setBrowser(self::$BASE_BROWSER);
        $this->setBrowserUrl($GLOBALS['base_url']);
        
    }
    
    public function testAuthNewUser()
    {
        $mainpage = new UIMAP_MainPage();
        $regPopup = new UIMAP_PopupRegistreit();
        
        $this->open("/");
        //$this->click($regPopup->LinkToCallPopupSignUp());
        $user = $this->CreatingAccount();
        $this->open("/");
        $this->Login($user['name'],$user['pass']);
        $login = $this->getText($mainpage->UsernameHeader());
        if($user['name']!=$login)
        {
            $message = " Registred name '".$user['name']."' not equals with name in header '".$login."'";
            $this->LogReport($message);
        }
        $this->assertEquals($user['name'], $login);
        $this->LogReport($user['name']);
    }
    
    public function testAuth()
    {
        $this->open("/search-all/index.html");
        $this->click("//form[@class='d_login']/input");
        //$this->Login();
    }
 }
?>
