$(document).ready(function () {
  //Sidebar
  $(".side-bar-close").click(function () {
    $(".hide-menu").click();
  });
  //Services
  $(".services").click(function () {
    alert($(this).attr("data-service"));
  });
});
