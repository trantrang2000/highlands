<?php
include_once "app/models/AuthModel.php";

class SignInController extends BaseController
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
      $password = $_POST["password"];
      $password = md5($password);
      $user = $this->model->getUserInfo($email);

      if (isset($user->email) && $user->password == $password) {
        $_SESSION["user"] = $user;

        if ($user->role == 2) {
          header("location:$APP_URL/admin");
        } else {
          header("location:$APP_URL");
        }
      } else {
        header("location:admin.php?controller=SignIn&type=auth&action=fail");
      }
    }

    $this->setTemplate("auth/sign-in/index");
    $this->setLayout("AuthLayout");
  }
}
