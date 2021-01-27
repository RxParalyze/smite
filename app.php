<?php

    require_once("./Chorizorro/SmiteAPIHelper_1_0_1/Sources/SmiteAPIHelper.php");
    require_once("./Chorizorro/SmiteAPIHelper_1_0_1/Sources/SmiteAPISession.php");
    include("C:\Users\c17ph\AppData\Local\Smite_App\DEV_ID.php");
    include("C:\Users\c17ph\AppData\Local\Smite_App\AUTH_KEY.php");

    $cacheFile = "C:\Users\c17ph\AppData\Local\Smite_App\session_cache.txt";
    $session = new SmiteAPISession();

    //$session->loadFromCache($cacheFile);

    if($session->loadFromCache($cacheFile) === SmiteAPISession::SESSION_STATE_VALID) {
        SmiteAPIHelper::setSession($session);
    }
    else {
        SmiteAPIHelper::setCredentials($DEV_ID, $AUTH_KEY);
        SmiteAPIHelper::createSession();
    }

    SmiteAPIHelper::$_format = SmiteAPIHelper::SMITE_API_FORMAT_JSON;
	SmiteAPIHelper::$_format = "json";

    SmiteAPIHelper::getSession()->saveToCache($cacheFile);

?>
