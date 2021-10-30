<?php
include_once "app/models/AuthModel.php";

class SignUpController extends BaseController
{
  public $model;

  public function __construct()
  {
    global $APP_URL;
    $this->model = new AuthModel();

    if (isset($_SESSION["user"])) {
      header("location:index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $user = $this->model->getUserInfo($email);

      if (isset($user->email)) {
        header("location:admin.php?controller=SignUp&type=auth&action=fail");
      } else {
        $this->model->register();
        header("location:$APP_URL");
      }
    }

    $this->setTemplate("auth/sign-up/index");
    $this->setLayout("AuthLayout");
  }
}
