<?php
require '../core/autoload.php';
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 01.09.17
 * Time: 23:23
 */
use Mvc\Core\Components\CoreHelper;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = new \Mvc\Components\MyKernel(CoreHelper::buildConfig());
$app->run();

?>