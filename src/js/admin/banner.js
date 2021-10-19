import $ from "jquery/dist/jquery";
import "jquery-validation/dist/jquery.validate";

$().ready(function () {
  let ruleThumbnail = {};
  if (!$("#form").hasClass("has-thumbnail")) {
    ruleThumbnail = {
      required: true
    };
  }

  $("#form").validate({
    rules: {
      title: {
        maxlength: 255
      },
      link: {
        maxlength: 255
      },
      thumbnail: ruleThumbnail,
      display_order: {
        digits: true
      }
    }
  });
});
