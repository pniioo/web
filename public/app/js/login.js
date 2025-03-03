// Language Selecortor Area
$(document).ready(function(){
    if ($(".dropdown").length) {
        $(document).on("click", ".dropdown-menu .dropdown-item", function (e) {
            e.preventDefault();
            if (!$(this).hasClass("active")) {
                var swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-danger me-3",
                    },
                    buttonsStyling: false,
                });
                swalWithBootstrapButtons
                    .fire({
                        title: "Are you sure?",
                        text: "Do you really want to change your current language!",
                        icon: "warning",
                        confirmButtonText: "<i class='fas fa-check-circle me-1'></i> Yes, I am!",
                        cancelButtonText: "<i class='fas fa-times-circle me-1'></i> No, I'm Not",
                        showCancelButton: true,
                        reverseButtons: true,
                        focusConfirm: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            if (!$(this).hasClass("active")) {
                                $(".dropdown-menu .dropdown-item").removeClass("active");
                                $(this).addClass("active");
                                $(this)
                                    .parents(".dropdown")
                                    .find(".btn")
                                    .html("<span class='flag-icon flag-icon-us me-1'></span>" + $(this).text());
                            }
                            Swal.fire({
                                icon: "success",
                                title: "Amazing!",
                                text: "Your current language has been changed successfully.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
            }
        });
    }
});




// PassWoed Srcipt

$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });




// Telephone Script

var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        autoInsertDialCode: true,
        separateDialCode: true,
        showFlags: false,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
    });


