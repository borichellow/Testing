<?php
require_once 'CommonMainTest.php';
include_once dirname(__DIR__).'/UIMap/UIMAP_PopupRegistreit.php';

class RecoveryPassTest extends CommonMainTest
{
    //we test recovery pas using mailinator service
    public function testCheckRecoveryPassByMailinator()
    {
        $mail_login = "0uPSfOkHc7";
        $newpass    = $this->RandString();
        $this->RecoveryPassMailinator($mail_login,$newpass);
        $this->Logout();
        $this->RecoveryPassMailinator($mail_login, "123456");
    }
    
    //test recovery by roundcube
    public function testRecoveryPass()
    {
        $login_key = "qkyx4Kwqf0";
        $newpass   = $this->RandString();
        $this->open("/");
        $this->RecoveryPassCommon($login_key, $newpass);
    }
    
    //set old pass using recovery link
    public function testBackStandartPass()
    {
        $login_key = "qkyx4Kwqf0";
        $newpass   = "123456";
        $this->open("/");
        $this->RecoveryPassCommon($login_key, $newpass);
        $this->Login($login_key, $newpass);
    }
}
?>
