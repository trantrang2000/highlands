/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************!*\
  !*** ./src/js/client.js ***!
  \**************************/
/* Sidebar */
var sidebarLinks = Array.from(document.querySelectorAll("#navbarNavDropdown .nav-link"));
sidebarLinks.forEach(function (link) {
  if (link.href === window.location.href) {
    link.classList.add("active");
  }
});
/* Form search */

var btnToggle = document.querySelector("#toggle-form-search");
var formSearch = document.querySelector("#form-search");
btnToggle.addEventListener("click", function () {
  formSearch.classList.toggle("d-none");
  formSearch.querySelector("input").focus();
});
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvY2xpZW50LmpzIiwibWFwcGluZ3MiOiI7Ozs7O0FBQUE7QUFDQSxJQUFNQSxZQUFZLEdBQUdDLEtBQUssQ0FBQ0MsSUFBTixDQUNuQkMsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQiw4QkFBMUIsQ0FEbUIsQ0FBckI7QUFJQUosWUFBWSxDQUFDSyxPQUFiLENBQXFCLFVBQUNDLElBQUQsRUFBVTtBQUM3QixNQUFJQSxJQUFJLENBQUNDLElBQUwsS0FBY0MsTUFBTSxDQUFDQyxRQUFQLENBQWdCRixJQUFsQyxFQUF3QztBQUN0Q0QsSUFBQUEsSUFBSSxDQUFDSSxTQUFMLENBQWVDLEdBQWYsQ0FBbUIsUUFBbkI7QUFDRDtBQUNGLENBSkQ7QUFNQTs7QUFDQSxJQUFNQyxTQUFTLEdBQUdULFFBQVEsQ0FBQ1UsYUFBVCxDQUF1QixxQkFBdkIsQ0FBbEI7QUFDQSxJQUFNQyxVQUFVLEdBQUdYLFFBQVEsQ0FBQ1UsYUFBVCxDQUF1QixjQUF2QixDQUFuQjtBQUVBRCxTQUFTLENBQUNHLGdCQUFWLENBQTJCLE9BQTNCLEVBQW9DLFlBQU07QUFDeENELEVBQUFBLFVBQVUsQ0FBQ0osU0FBWCxDQUFxQk0sTUFBckIsQ0FBNEIsUUFBNUI7QUFDQUYsRUFBQUEsVUFBVSxDQUFDRCxhQUFYLENBQXlCLE9BQXpCLEVBQWtDSSxLQUFsQztBQUNELENBSEQsRSIsInNvdXJjZXMiOlsid2VicGFjazovL2ZyZXNoLWdhcmRlbi8uL3NyYy9qcy9jbGllbnQuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyogU2lkZWJhciAqL1xyXG5jb25zdCBzaWRlYmFyTGlua3MgPSBBcnJheS5mcm9tKFxyXG4gIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIjbmF2YmFyTmF2RHJvcGRvd24gLm5hdi1saW5rXCIpXHJcbik7XHJcblxyXG5zaWRlYmFyTGlua3MuZm9yRWFjaCgobGluaykgPT4ge1xyXG4gIGlmIChsaW5rLmhyZWYgPT09IHdpbmRvdy5sb2NhdGlvbi5ocmVmKSB7XHJcbiAgICBsaW5rLmNsYXNzTGlzdC5hZGQoXCJhY3RpdmVcIik7XHJcbiAgfVxyXG59KTtcclxuXHJcbi8qIEZvcm0gc2VhcmNoICovXHJcbmNvbnN0IGJ0blRvZ2dsZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIjdG9nZ2xlLWZvcm0tc2VhcmNoXCIpO1xyXG5jb25zdCBmb3JtU2VhcmNoID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNmb3JtLXNlYXJjaFwiKTtcclxuXHJcbmJ0blRvZ2dsZS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xyXG4gIGZvcm1TZWFyY2guY2xhc3NMaXN0LnRvZ2dsZShcImQtbm9uZVwiKTtcclxuICBmb3JtU2VhcmNoLnF1ZXJ5U2VsZWN0b3IoXCJpbnB1dFwiKS5mb2N1cygpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbInNpZGViYXJMaW5rcyIsIkFycmF5IiwiZnJvbSIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJsaW5rIiwiaHJlZiIsIndpbmRvdyIsImxvY2F0aW9uIiwiY2xhc3NMaXN0IiwiYWRkIiwiYnRuVG9nZ2xlIiwicXVlcnlTZWxlY3RvciIsImZvcm1TZWFyY2giLCJhZGRFdmVudExpc3RlbmVyIiwidG9nZ2xlIiwiZm9jdXMiXSwic291cmNlUm9vdCI6IiJ9