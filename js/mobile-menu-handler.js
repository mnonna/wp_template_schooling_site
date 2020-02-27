jQuery(document).ready(function($) {
  $("#expand-mobile-menu").on("click", function() {
    const expand = document.getElementById("expand-menu-id");
    $(".ekosem-mobile-nav-wrapper-menu").toggleClass("animate");
    $(".mobile-menu-bar").style = "z-index: -1;";
    expand.style.display = "flex";
    expand.style.position = "fixed";
  });

  $("#collapse-mobile-menu").on("click", function() {
    const expand = document.getElementById("expand-menu-id");
    $(".ekosem-mobile-nav-wrapper-menu").toggleClass("animate");
    $(".mobile-menu-bar").style = "z-index: 2;";
    expand.style.display = "none";
  });

  const mobile_menu = document.getElementById("expand-menu-id");
  $(window).resize(function() {
    const width = $(window).width();
    if (width > 850) {
      mobile_menu.style.display = "none";
    }
  });
});
