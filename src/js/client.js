/* Sidebar */
const sidebarLinks = Array.from(
  document.querySelectorAll("#navbarNavDropdown .nav-link")
);

sidebarLinks.forEach((link) => {
  if (link.href === window.location.href) {
    link.classList.add("active");
  }
});

/* Form search */
const btnToggle = document.querySelector("#toggle-form-search");
const formSearch = document.querySelector("#form-search");

btnToggle.addEventListener("click", () => {
  formSearch.classList.toggle("d-none");
  formSearch.querySelector("input").focus();
});
