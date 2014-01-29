<?php
require_once dirname(__DIR__).'/PHPUnit/CommonSeleniumTest.php';
include_once dirname(__DIR__).'/UIMap/UIMAP_MainPage.php';
include_once dirname(__DIR__).'/UIMap/OtherService/UI_Roundcube.php';
include_once dirname(__DIR__).'/UIMap/OtherService/UI_Mailinator.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_MainTabs.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_BuyerProfile.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_BuyerChangePass.php';


class CommonMainTest extends CommonSeleniumTest {
    
    function setUp() {
        $this->setBrowser(self::$BASE_BROWSER);
        $this->setBrowserUrl($GLOBALS['base_url']);
        
    }    
    public function RecoveryPassMailinator($mail_login,$newpass)
    {
            $authElement = new UIMAP_MainPage();
            $mailPage    = new UI_Mailinator();
        
            $this->open("/");
            $this->click($authElement->LoginSubmit());
            $this->click($authElement->ResetPassLink());
            $this->type($authElement->ResetPassEmailInput(),$mail_login."_dph@mailinator.com");
            $this->click($authElement->ResetPassSubmit());
      /*
       * Follow to mail service   
       */
            $this->open("http://mailinator.com");
                sleep(1);
            $this->type($mailPage->MailInput(),$mail_login."_dph");
            $this->clickAndWait($mailPage->MailSubmit());
                sleep(1);
            $this->click($mailPage->ResetPassLetter());
            sleep(3);
            $this->clickAtAndWait($mailPage->ResetPassLink());
      /*
       * Redirecting back to depositphotos to set new pass
       */
            $this->type($authElement->ResetPassNewInput(),$newpass);
            $this->typeKeys($authElement->ResetPassNewInput(),$newpass);
            $this->type($authElement->ResetPassNewInput2(),$newpass);
            $this->typeKeys($authElement->ResetPassNewInput2(),$newpass);
            $this->click($authElement->ResetPassNewSubmit());
        
      /*
       * Check for auth using new data
       */
            $this->open("/");
            $this->Login($mail_login, $newpass);
        }
        
        public function RecoveryPassCommon($login_key,$newpass)
        {
                $authElement = new UIMAP_MainPage();
                $rcPage      = new UI_Roundcube();
            
                $this->click($authElement->LoginSubmit());
                $this->click($authElement->ResetPassLink());
                $this->type($authElement->ResetPassEmailInput(),"tester-".$login_key."@depositphotos.com");
                $this->click($authElement->ResetPassSubmit());
                $this->assertElementNotPresent($authElement->ResetPassError());
          /*
           * Follow to roundcube (common test mailbox)  
           */
                $this->open("http://mail.depositphotos.com");
                $this->type($rcPage->LoginUserInput(),"tester@depositphotos.com");
                $this->type($rcPage->LoginPassInput(),"ASVKgd8frkgs");
                $this->clickAndWait($rcPage->LoginSubmit());
                sleep(2);
          /*
           *  Method to open letter, usage attribute href and build full url for chosen letter
           */
                    $url_letter = $this->getAttribute("//tr[2]/td[2]/a@href");
                    $url_letter = str_replace(".", "", $url_letter);
                    $url_letter = "http://mail.depositphotos.com".$url_letter;

                $this->open($url_letter);
                sleep(2);
                $this->click("//tr[3]/td/font/a");
          /*
           * Redirect to depositphotos. Page will open in new window. We choose new window
           */  
                $arr = $this->getAllWindowNames();
                $this->selectWindow($arr[1]);
                sleep(2);
          /*
           * Set new pass at popup with form 
           */
                $this->type($authElement->ResetPassNewInput(),$newpass);
                $this->typeKeys($authElement->ResetPassNewInput(),$newpass);
                $this->type($authElement->ResetPassNewInput2(),$newpass);
                $this->typeKeys($authElement->ResetPassNewInput2(),$newpass);
                $this->click($authElement->ResetPassNewSubmit());

           /*
            * Check for auth using new data
            */
                $this->open("/");
                $this->Login($login_key, $newpass);
        }
        
        public function ChangePass($login, $pass, $newpass)
        {
            $tabs    = new UI_MainTabs();
            $profile = new UI_BuyerProfile();
            $form    = new UI_BuyerChangePass();
            /*
             * Follow to form for changing pass 
             */
                $this->Login($login, $pass);
                $this->open("/home_buyer.php");
                $this->clickAndWait($tabs->ProfileTab());
                $this->clickAndWait($profile->ChangePassTab());
          /*
           *  Fill out the form
           */  
                
                $this->LogReport($newpass);
                $this->type($form->OldPassInput(),$pass);
                $this->type($form->NewPassInput(),$newpass);
                $this->type($form->NewPassConfirmInput(),$newpass);
                $this->click($form->ChangePassButton());
                
        }
        
}

?>