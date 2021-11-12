<?php
class AboutController extends BaseController
{
  public function __construct()
  {
    $this->setTemplate("client/about/index");
    $this->setLayout("ClientLayout");
  }
}
