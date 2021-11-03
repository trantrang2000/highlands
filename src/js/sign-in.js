import $ from "jquery/dist/jquery";
import "jquery-validation/dist/jquery.validate";

import { Toast } from "bootstrap";

$().ready(function () {
  const form = $("#form-sign-in"),
    toast = Toast.getOrCreateInstance($("#toast")),
    action = new URLSearchParams(window.location.search).get("action");

  form.validate({
    rules: {
      email: {
        required: true
      },
      password: {
        required: true
      }
    }
  });

  if (action === "fail") {
    toast.show();
  }
});
