<?php
require_once dirname(__DIR__).'/PHPUnit/CommonSeleniumTest.php';

class Faq extends CommonSeleniumTest{
 
    function setUp() {
        $this->setBrowser(self::$BASE_BROWSER);
        $this->setBrowserUrl("http://depositphotos.com");
    }

    public function testfaq()
    {
        $this->open("/faq.html");
        $i = 1;
        
        while($this->isElementPresent("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]/li"))
        {
            $j = 1;
            //echo $this->getAttribute("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]@style");
            if($this->getAttribute("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]@style")!="display: none;")
            {
            while($this->isElementPresent("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]/li[".$j."]"))
                {
                    echo $i." - ".$j."\n";
                         $titleLink = $this->getText("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]/li[".$j."]/a");
                    $this->click("//div[@class='gr_form_plavbg']/div[@class='gr_inner_plavbg']/ul[".$i."]/li[".$j."]/a");
                    sleep(2);
                    
                        $titleBlock = $this->getText("//div[@class='table_content_plavbg2 table_content_plavbg2_bg']/div/div[2]");
                        $this->LogReport($titleLink." - ".$titleBlock."\n");
                    $this->assertEquals($titleBlock, $titleLink);
                    
                    $j++;
                }
            }
            $i++;
            }
    }
}

?>
