jQuery(document).ready(function($) {
  inputFieldChecker("form-control");

  $(document).on("click", ".number-spinner button", function() {
    var btn = $(this),
      oldValue = btn
        .closest(".number-spinner")
        .find("input")
        .val()
        .trim(),
      newVal = 0;

    if (btn.attr("data-dir") == "up") {
      newVal = parseInt(oldValue) + 1;
    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    btn
      .closest(".number-spinner")
      .find("input")
      .val(newVal);
  });

  function inputFieldChecker(input) {
    var phInput = document.getElementsByClassName(input);

    for (var i = 0; i < phInput.length; i++) {
      phInput[i].addEventListener("click", function() {
        for (var j = 0; j < phInput.length; j++) {
          if (phInput[j] == this) {
            phInput[j].classList.add("active");
          } else {
            phInput[j].classList.remove("active");
            phInput[j].style.border = "";
          }
        }
      });
    }
  }

  $(document).on("click", ".confirm-participants", function() {
    const number = document.getElementById("numberParticipants");
    const participants = number.value;
    const partDiv = document.getElementById("divPart");

    var html = "";

    for (let i = 0; i < participants; i++) {
      html +=
        '<div class="row"><div class="col"><input type="text" class="form-control participants partName" placeholder="Imię uczestnika"></div><div class="col"><input type="text" class="form-control participants partSurname" placeholder="Nazwisko uczestnika"></div></div>';
    }

    partDiv.innerHTML = html;

    inputFieldChecker("participants");
  });

  $(document).on("input", ".partName.active", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[A-Z]{1}[a-z]{1,30}$/;

    const elem = document.getElementsByClassName("partName active");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem[0].style.border = "3px solid red";
    } else {
      elem[0].style.border = "3px solid green";
    }
  });

  $(document).on("input", ".partSurname.active", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[A-Z]{1}[a-z]{1,30}$/;

    const elem = document.getElementsByClassName("partSurname active");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem[0].style.border = "3px solid red";
    } else {
      elem[0].style.border = "3px solid green";
    }
  });

  $(document).on("input", "#unitInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[a-zA-Z]{2,30}$/;

    const elem = document.getElementById("unitInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#addressInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[A-ZĄĆĘŁŃÓŚŹŻ]{1}[A-ZĄĆĘŁŃÓŚŹŻa-ząćęłńóśźż0-9!@#$&()\\-`.+,/\ ]{1,30}$/;

    const elem = document.getElementById("addressInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#postalInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[0-9]{2}\-[0-9]{3}$/;

    const elem = document.getElementById("postalInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#nipInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[0-9]{10}$/;

    const elem = document.getElementById("nipInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#conPersonInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^[A-ZĄĆĘŁŃÓŚŹŻ][A-ZĄĆĘŁŃÓŚŹŻa-ząćęłńóśźż ]{1,20}$/;

    const elem = document.getElementById("conPersonInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#phoneInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^(?:(?:(?:\+|00)?48)|(?:\(\+?48\)))?(?:1[2-8]|2[2-69]|3[2-49]|4[1-68]|5[0-9]|6[0-35-9]|[7-8][1-9]|9[145])\d{7}$/;

    const elem = document.getElementById("phoneInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("input", "#emailInput", function() {
    var curr = $(this);
    var curr_val = curr.val();
    const num_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const elem = document.getElementById("emailInput");

    if (!curr_val.match(num_regex) || curr.length == 0) {
      elem.style.border = "3px solid red";
    } else {
      elem.style.border = "3px solid green";
    }
  });

  $(document).on("click", ".submit-sign-up", function() {
    var o = [];

    var dec = [];

    const names = document.getElementsByClassName("partName");
    const surnames = document.getElementsByClassName("partSurname");
    const declarant = document.getElementById("unitInput");
    const address = document.getElementById("addressInput");
    const postal = document.getElementById("postalInput");
    const nip = document.getElementById("nipInput");
    const contact_person = document.getElementById("conPersonInput");
    const contact_phone = document.getElementById("phoneInput");
    const email = document.getElementById("emailInput");
    const schooling = document.getElementById("select-schooling-id");

    const response_div = document.getElementById("response-after-submit");

    for (let i = 0; i < names.length; i++) {
      o.push({
        name: names[i].value,
        surname: surnames[i].value,
        declarant: declarant.value
      });
    }

    dec.push({
      declarant: declarant.value,
      address: address.value,
      postal: postal.value,
      nip: nip.value,
      email: email.value,
      con_person: contact_person.value,
      con_phone: contact_phone.value
    });

    if (
      names.length == 0 ||
      surnames.length == 0 ||
      declarant.value == "" ||
      address.value == "" ||
      postal.value == "" ||
      nip.value == "" ||
      contact_person.value == "" ||
      contact_phone.value == "" ||
      email.value == "" ||
      schooling.value == ""
    ) {
      alert("Nie podano wymaganych danych. Proszę sprawdzić formularz :)");
    } else {
      data = {
        action: "handle_participants",
        credentials: o,
        schooling: schooling.value,
        declarant_data: dec
      };

      $.post(ajaxurl, data, function(response) {
        response_div.innerHTML = response;
        setTimeout(function() {
          location.reload();
        }, 2500);
      });
    }
  });
});
