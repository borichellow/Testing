<?php

require_once 'CommonMainTest.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_MainTabs.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_BuyerProfile.php';
include_once dirname(__DIR__).'/UIMap/BuyerCabinet/UI_BuyerProfileEdit.php';

class EditBuyerProfileTest extends CommonMainTest
{
    
    //choose some inputs for test
    private function listInputs()
    {
        $all = array(
            "BusinessName",
            "Email",
            "Address",
            "City",
            "State",
            "Zip",
            "Country", //select
            "TimeZone", //select
            "Company",
            "Tax",
            "Phone",
            "BusinessPhone",
            "Website",
            "Facebook",
            "Occupation", //select
            "Biography" //textarea
          );
        $list = array();
        foreach ($all as $value) {
              $i = rand(0, 1);
              if($i==1){
                  array_push($list, $value);
              }
          }
          return $list;
    }
    
    //choose some checkboxes
    private function listCheckBoxes()
    {
        $all = array(
            "FirstName",
            "LastName",
            //"BusinessName",
            "Email",
            "Address",
            "City",
            "State",
            "Zip",
           // "Country", //select
            "Company",
            "Phone",
            //"BusinessPhone",
            "Website",
            "Facebook",
            "Occupation", //select
            "Biography" //textarea
        );
        $marked   = array();
        $unmarked = array();
        foreach ($all as $value) {
            $i = rand(0, 1);
            if($i==1){
                array_push($marked, $value);
            }
            else { array_push($unmarked, $value);}
        }
        $list = array("marked" => $marked, "unmarked" => $unmarked);
        return $list;
    }

    //fill one of forms    
    private function fillForm($key,$result)
    {
        $form   = new UI_BuyerProfileEdit();
        switch ($key){
           case 'BusinessName': $this->type($form->BusinessNameInput(),  "D".$this->RandString());
               $result[$key] = $this->getValue($form->BusinessNameInput());
               break;
           case 'Email':        $this->type($form->EmailInput(),  "tester-".$this->RandString()."@depositphotos.com");
               $result[$key] = $this->getValue($form->EmailInput());
               break;
           case 'Address':      $this->type($form->AddressInput(),  "D".$this->RandString()); 
               $result[$key] = $this->getValue($form->AddressInput());
               break;
           case 'City':         $this->type($form->CityInput(),  "D".$this->RandString()); 
               $result[$key] = $this->getValue($form->CityInput());
               break;
           case 'State':        $this->type($form->StateInput(),  "D".$this->RandString());
               $result[$key] = $this->getValue($form->StateInput());
               break;
           case 'Zip':          $this->type($form->ZipInput(), "D". $this->RandString());
               $result[$key] = $this->getValue($form->ZipInput());
               break;
           case 'Country':      $this->select($form->CountrySelect(), "index=".rand(2, 240)); 
               $result[$key] = $this->getSelectedLabel($form->CountrySelect());
               break;
          /* case 'TimeZone': $this->click("//a[@id='timezone_show_all']");  
               $this->select($form->TimeZoneSelect(),  "index=".  rand(0, 1)); 
               $result[$key] = $this->getSelectedLabel($form->TimeZoneSelect());
               break;*/
           case 'Company':      $this->type($form->CompanyInput(), "D".$this->RandString()); 
               $result[$key] = $this->getValue($form->CompanyInput());
               break;
           case 'Tax':          $this->type($form->TaxID(), rand(100000, 999999));  
               $result[$key] = $this->getValue($form->TaxID());
               break;
           case 'Phone':        $this->type($form->PhoneInput(), "044-".rand(100, 999)."-".rand(10, 99)."-".rand(10, 99)); 
               $result[$key] = $this->getValue($form->PhoneInput());
               break;
           case 'BusinessPhone':$this->type($form->BusinessPhoneInput(), "044-".rand(100, 999)."-".rand(10, 99)."-".rand(10, 99));  
               $result[$key] = $this->getValue($form->BusinessPhoneInput());
               break;
           case 'Website':      $this->type($form->WebsiteInput(), "www.".$this->RandString().".ru");  
               $result[$key] = $this->getValue($form->WebsiteInput());
               break;
           case 'Facebook':     $this->type($form->FacebookInput(), $this->RandString());  
               $result[$key] = $this->getValue($form->FacebookInput());
               break;
           case 'Occupation':   $this->select($form->OccupationSelect(),  "index=".  rand(1, 11));
               $result[$key] = $this->getSelectedLabel($form->OccupationSelect());
               break;
           case 'Biography':    $this->type($form->BiographyArea(), "D".$this->RandString());  
               $result[$key] = $this->getValue($form->BiographyArea());
               break;
                     
        }
        return $result;
        }
    
    //get up xpath by checkboxes
        private function chooseCheckbox($key)
    {
        $checkbox = new UI_BuyerProfileEdit();
        switch ($key)
        {
            case "FirstName" : return $checkbox->FirstNameCheckbox();            break;
            case "LastName"  : return $checkbox->LastNameCheckbox();             break;
            case "Email"     : return $checkbox->EmailCheckbox();                break;
            case "Address"   : return $checkbox->AddressCheckbox();              break;
            case "City"      : return $checkbox->CityCheckbox();                 break;
            case "State"     : return $checkbox->StateCheckbox();                break;
            case "Zip"       : return $checkbox->ZipCheckbox();                  break;
            case "Company"   : return $checkbox->CompanyCheckbox();              break;
            case "Phone"     : return $checkbox->PhoneCheckbox();                break;
            case "BusinessPhone" : return $checkbox->BusinessPhoneCheckbox();    break;
            case "Website"   : return $checkbox->WebsiteCheckbox();              break;
            case "Facebook"  : return $checkbox->FacebookCheckbox();             break;
            case "Occupation": return $checkbox->OccupationCheckbox();           break;
            case "Biography" : return $checkbox->BiographyCheckbox();            break;
        }
    }
            
    //check up some checkboxes
    private function markCheckbox($key, $index)
    {
        if((!$this->isChecked($this->chooseCheckbox($key)) && $index==true) || 
                ($this->isChecked($this->chooseCheckbox($key)) && $index==false))
        {
            $this->click($this->chooseCheckbox($key));
        }
    }
 
    // private function checkField($key, $value)
   private function checkField($array)
    {
        foreach ($array as $key => $value) {
         if($key!="Tax")
         {
            if(!$this->isTextPresent($value))
            {
                $url = $this->getLocation();
                $this->LogReport("Row - ".$key.": ".$vlaue." is absent || url - ".$url);
            } 
             $this->assertTextPresent($value);
         }
       }
    }
    private function checkPublicProfile($inputs, $checkboxes)
    {
        $markedFields = array();
        foreach ($checkboxes['marked'] as $value)
        {
            if(isset($inputs[$value]))
            {
                $markedFields[$value] = $inputs[$value];
            }
        }
        $this->checkField($markedFields);
        foreach ($checkboxes['unmarked'] as $value) {
            if($this->isTextPresent($value.":"))
            {
                $url = $this->getLocation();
                $this->LogReport($value." must be disabled on pubic profile || url - ".$url);
            }
            $this->assertTextNotPresent($value.":");
            }
    }

    private function FilloutInputs($inputs) //fill all choosen inputs
    {
        $result = array();
        foreach($inputs as $value) { 
            $result = $this->fillForm($value,$result);
            }
        return $result;
    }
            
    private function FilloutCheckBoxes($checkboxes) //check up all choosen checkboxes
    {
        foreach ($checkboxes['marked'] as $value) {
            $this->markCheckbox($value, true);
        }
        foreach ($checkboxes['unmarked'] as $value) {
            $this->markCheckbox($value, false);
        }
    }

    /*
     * @test
     */
    public function testEditProfile()
    {
       $tabs    = new UI_MainTabs();
       $profile = new UI_BuyerProfile();
       $form    = new UI_BuyerProfileEdit();
            $this->open("/");
            $login = "LnCajkV6fS";
            $pass  = "123456";
            $this->Login($login, $pass);
       /*
        * 
        */
            $this->clickAndWait($tabs->ProfileTab());
            $this->clickAndWait($profile->EditButton());
            $inputs = $this->listInputs();
            $final = $this->FilloutInputs($inputs);
            
            $checkboxes = $this->listCheckBoxes();
            $this->FilloutCheckBoxes($checkboxes);
            
            $this->clickAtAndWait($form->SaveButton(),"120000");
            
            $this->clickAndWait($profile->PrivateProfileTab());
            $this->checkField($final);
            
            $this->clickAndWait($profile->PublicProfileTab());
            $this->switchToLang();
            $this->checkPublicProfile($final, $checkboxes);
            }
}
?>
