<?php
include_once "app/models/UserModel.php";

class AuthModel extends Model
{
  public $model;

  public function __construct()
  {
    $this->model = new UserModel();
  }

  /**
   * Lấy thông tin user qua email
   */
  public function getUserInfo($email)
  {
    return parent::getRecord("Select * from users where email = '$email'");
  }

  /**
   * Đăng ký tài khoản
   */
  public function register()
  {
    $this->model->addNewUser([
      'first_name' => $_POST['first_name'],
      'last_name' => $_POST['last_name'],
      'email' => $_POST['email'],
      'address' => $_POST['address'],
      'phone' => $_POST['phone'],
      'password' => md5($_POST['password']),
      'role' => 1,
    ]);

    header("location:admin.php?controller=Login&type=auth");
  }
}
