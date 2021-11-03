import $ from "jquery/dist/jquery";
import "jquery-validation/dist/jquery.validate";

import { Toast } from "bootstrap";

$().ready(function () {
  const form = $("#form-sign-up"),
    toast = Toast.getOrCreateInstance($("#toast")),
    action = new URLSearchParams(window.location.search).get("action");

  form.validate({
    rules: {
      first_name: {
        required: true
      },
      last_name: {
        required: true
      },
      email: {
        required: true
      },
      password: {
        required: true
      },
      "confirm-password": {
        equalTo: "#password"
      }
    }
  });

  if (action === "fail") {
    toast.show();
  }
});
