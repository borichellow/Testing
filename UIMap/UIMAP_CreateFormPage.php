<?php
class UIMAP_CreateFormPage{
    
    public function formName(){
        return "//input[@name='form.name']";
    }
    
    public function formLanguige(){
        return "//select[@name='form.lid']";
    }
    
    public function formRespuniqtype($i = 1){
        return "//label[@onclick='SwitchActiveRadio(this)'][".$i."]/input[@name='form.respuniqtype']";
    }
    
    public function submitButton(){
        return "//button[@type='submit' and @class='medium']";
    }
}
?>
