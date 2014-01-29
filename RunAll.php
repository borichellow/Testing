<?php

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'TestSuite::main');
}
//include 'tests/Testing_Selenium/tests/UIMap/UIMAP_SearchListResult.php'; 
//require_once 'tests/PHPUnit/Framework.php';
//require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'tests/CreateForm.php';
require_once 'tests/ListTheForms.php';

 
class AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit Framework');

        $suite->addTestSuite('CreateForm');
        $suite->addTestSuite('ListTheForms');
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'Framework_AllTests::main') {
    Framework_AllTests::main();
}

