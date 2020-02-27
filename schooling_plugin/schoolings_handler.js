jQuery(document).ready(function($) {
  var dropdowns = document.getElementsByClassName(
    "ekosem-schooling-item-dropdown"
  );
  var dropdowns_declarants = document.getElementsByClassName(
    "ekosem-declarants-item-dropdown"
  );

  for (let i = 0; i < dropdowns.length; i++) {
    dropdowns[i].addEventListener("click", function() {
      var content = $(this).next(".ekosem-schooling-item-data");

      if (content[0].style.display == "none") {
        content[0].style.display = "flex";
      } else {
        content[0].style.display = "none";
      }
    });
  }

  for (let i = 0; i < dropdowns_declarants.length; i++) {
    dropdowns_declarants[i].addEventListener("click", function() {
      var content = $(this).next(".ekosem-declarants-item-data");

      if (content[0].style.display == "none") {
        content[0].style.display = "flex";
      } else {
        content[0].style.display = "none";
      }
    });
  }

  $(".confirm-participants").on("click", function() {
    var o = [];

    const inputTopic = document.getElementById("topicInput");
    const inputDate = document.getElementById("dateInput");
    const inputPrice = document.getElementById("priceInput");
    const inputMax = document.getElementById("maxNumInput");

    const topValue = inputTopic.value;
    const dateValue = inputDate.value;
    const priceValue = inputPrice.value;
    const maxValue = inputMax.value;

    o.push(
      topValue,
      dateValue,
      parseInt(priceValue, 10),
      parseInt(maxValue, 10)
    );

    data = {
      action: "handle_insert",
      inputValues: o
    };

    $.post(ajaxurl, data, function(response) {
      alert(response);
      setTimeout(function() {
        location.reload();
      }, 2500);
    });
  });
});
