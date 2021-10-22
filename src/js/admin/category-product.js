import $ from "jquery/dist/jquery";
import "jquery-validation/dist/jquery.validate";

$().ready(function () {
  $("#form").validate({
    rules: {
      title: {
        required: true,
        maxlength: 255
      },
      display_order: {
        digits: true
      }
    }
  });
});
