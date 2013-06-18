<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
//require_once( Yii::getPathOfAlias('system.test.CTestCase').'.php' ); // Force the PhpUnit autoload via CTestCase file
//require_once( Yii::getPathOfAlias('system.test.CWebTestCase').'.php' ); // Force the PhpUnit autoload via CWebTestCase file
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
