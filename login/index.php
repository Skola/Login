<?php
//
// PHASE: BOOTSTRAP
//
define('SKOLA_INSTALL_PATH', dirname(__FILE__));
define('SKOLA_SITE_PATH', SKOLA_INSTALL_PATH . '/site');

require(SKOLA_INSTALL_PATH.'/src/CSkola/bootstrap.php');

$ly = CSkola::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$ly->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$ly->ThemeEngineRender();