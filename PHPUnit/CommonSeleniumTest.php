<?php
require dirname(dirname(__DIR__)).'/config.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
//include_once dirname(__DIR__).'/UIMap/UIMAP_MainPage.php';
//include_once dirname(__DIR__).'/UIMap/UIMAP_PlansPrices.php';
//include_once dirname(__DIR__).'/UIMap/UIMAP_PopupRegistreit.php';

/**
 * Description of CommonSeleniumTest
 *
 * @author Matrizarium
 */
class CommonSeleniumTest extends PHPUnit_Extensions_SeleniumTestCase {

    static $BASE_BROWSER = "*firefox";
    /**
     *
     * @var string
     * firefox
     * mock
     * firefoxproxy
     * pifirefox
     * chrome
     * iexploreproxy
     * iexplore
     * firefox3
     * safariproxy
     * googlechrome
     * konqueror
     * firefox2
     * safari
     * piiexplore
     * firefoxchrome
     * opera
     * webdriver
     * iehta
     * custom
     */
    static $BASE_DOMAIN  = "http://247delivery..loc";
    /**
     * @var string 
     *
     * 
     */
    
    static $KEY_DOMAIN = "dev";
    /**
     * @var string
     * production
     * common_dev
     * local_dev
     * 
     * For switch run tests
     */


}
