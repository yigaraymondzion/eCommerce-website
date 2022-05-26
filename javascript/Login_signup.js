$("#signup").click(function () {
  $("#first").fadeOut("fast", function () {
    $("#second").fadeIn("fast");
  });
});

$("#signin").click(function () {
  $("#second").fadeOut("fast", function () {
    $("#first").fadeIn("fast");
  });
});

$(function () {
  $("form[name='login']").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: "Please enter a valid email address",

      password: {
        required: "Please enter password",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});

$(function () {
  $("form[name='registration']").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      country: "required",
      city: "required",
      address: "required",
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
      phone: {
        required: true,
        minlength: 10,
      },
    },

    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      country: "Please Enter Yor Country",
      city: "Please Enter Your City",
      address: "Please Enter Your Address",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
      },
      phone: {
        required: "Please Enter Your Phone Number",
        minlength: "Please Enter Valid Phone Number.",
      },
      email: "Please enter a valid email address",
    },

    submitHandler: function (form) {
      form.submit();
    },
  });
});
