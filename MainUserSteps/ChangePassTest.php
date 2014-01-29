<?php

require_once 'CommonMainTest.php';

class ChangePassTest extends CommonMainTest
{
    public function testChange()
    {
        $this->open("/");
        $login   = "0uPSfOkHc7";
        $pass    = "123456";
        $newpass = $this->RandString();
        $this->ChangePass($login, $pass, $newpass);
        $this->Login($login, $newpass);
        $this->ChangePass($login, $newpass, $pass);
        $this->Login($login, $pass);
    }
}
?>
