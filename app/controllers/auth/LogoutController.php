<?php
class LogoutController
{
  public function __construct()
  {
    global $APP_URL;
    unset($_SESSION["user"]);
    header("location:$APP_URL/sign-in");
  }
}
