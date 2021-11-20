import $ from "jquery/dist/jquery";
import "jquery-validation/dist/jquery.validate";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

$().ready(function () {
  ClassicEditor.create(document.querySelector("#content")).catch((error) => {
    console.error(error);
  });

  $("#form").validate({
    rules: {
      title: {
        required: true,
        maxlength: 255
      },
      original_price: {
        digits: true
      },
      price: {
        digits: true
      },
      quantity: {
        digits: true
      },
      display_order: {
        digits: true
      }
    }
  });
});
