<?php
session_start();

include_once "config.php";
include_once "app/controllers/BaseController.php";
include_once "app/models/Model.php";

$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$controllerClass = "{$controller}Controller";
$controller = "app/controllers/client/{$controller}Controller.php";

if (file_exists($controller)) {
  include_once $controller;
  new $controllerClass();
} else {
  include_once "app/controllers/client/HomeController.php";
  new HomeController();
}
