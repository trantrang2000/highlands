import $ from "jquery/dist/jquery";

$().ready(function () {
  /* Sidebar */
  const sidebarLinks = Array.from(
    document.querySelectorAll("#sidebarNav .sidebar-link")
  );

  sidebarLinks.forEach((link) => {
    if (link.href === window.location.href) {
      link.classList.add("active");
    }
  });

  $("#toggleSidebar").click(function () {
    $("body").toggleClass("show");
  });

  /* Upload thumbnail */
  const inputFile = document.querySelector("#thumbnail");
  if (inputFile) {
    inputFile.addEventListener("change", (event) => {
      const file = event.target.files ? event.target.files[0] : null;
      if (!file) {
        return;
      }

      const reader = new FileReader();
      reader.onload = function () {
        const preview = document.querySelector("#thumbnailPreview");
        const icon = document.querySelector("#thumbnailIcon");
        if (icon) {
          icon.classList.add("d-none");
        }
        preview.classList.remove("d-none");
        preview.src = reader.result;
      };

      reader.readAsDataURL(file);
    });
  }

  /* Delete modal */
  $(".delete-btn").click(function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    const link = $("#deleteConfirmBtn").data("link");
    $("#deleteConfirmBtn").attr("href", `admin/${link}/delete/${id}`);
  });
});
