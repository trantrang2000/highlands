<?php
class BaseController
{
  public $template;
  public $layout;
  public $content;

  /**
   * Thiết lập view
   */
  public function setTemplate($_template, $var = [])
  {
    ob_start();
    $this->template = $_template;
    extract($var);
    include "views/{$this->template}.php";
    $this->content = ob_get_contents();
    ob_clean();
    ob_end_flush();
  }

  /**
   * Thiết lập layout sử dụng
   */
  public function setLayout($_layout, $var = [])
  {
    $this->layout = $_layout;
    extract($var);
    include "layouts/{$this->layout}.php";
  }
}
