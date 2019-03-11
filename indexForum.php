<?php

session_start();
require 'vendor/autoload.php';
use  \forum\controllers\App;

$app=new App();
$app->run();

?>