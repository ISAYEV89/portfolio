$(document).ready(function () {


    $('.emailBlock').append('<label id="email-error" class="error active" for="email"></label>');

    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
    });

    $.validator.addMethod("noSpace", function (value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $.validator.addMethod("loginRegex", function (value, element) {
        return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

    $.validator.addMethod("phoneRegex", function (value, element) {
        return this.optional(element) || /^[0-9\-]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

    $.validator.addMethod("customemail",
        function (value, element) {
            return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
        },
        "Zəhmət olmasa keçərli e-poçta yazın."
    );


//  pwcheck


    $("#contact-form").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                customemail: true
            },
            text: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Bölmə doldurulmalıdır."
            },
            email: {
                required: 'Bölmə doldurulmalıdır.',
                email: 'Zəhmət olmasa keçərli e-poçta yazın.'
            },
            text: {
                required: "Bölmə doldurulmalıdır."
            }
        },
        submitHandler: function () {


            let name = $('.contact-name').val();
            let email = $('.contact-email').val();
            let phone = $('.contact-phone').val();
            let text = $('.contact-text').val();


            $.ajax({
                url: siteUrl + 'ajax/contact.php',
                method: 'POST',
                data: {
                    "name": name,
                    "phone": phone,
                    "email": email,
                    "text": text,
                },
                dataType: "text",
                async: false,
                global: false,
                success: function (data) {
                    if (data === 'var') {
                        console.log(data);

                        $('#show-popup').click();



                        $('.error-msg').addClass('d-none');

                        $('.contact-name').val("");
                        $('.contact-name').removeClass('active');
                        $('.contact-name').siblings('label').removeClass('active');

                        $('.contact-email').val("");
                        $('.contact-email').removeClass('active');
                        $('.contact-email').siblings('label').removeClass('active');

                        $('.contact-phone').val("");
                        $('.contact-phone').removeClass('active');
                        $('.contact-phone').siblings('label').removeClass('active');

                        $('.contact-text').val("");
                        $('.contact-text').removeClass('active');
                        $('.contact-text').siblings('label').removeClass('active');

                    } else if (data === 'yoxdur') {
                        $('.error-msg').removeClass('d-none');

                    }

                }
            })


        }

    });





});




