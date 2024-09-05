$(document).ready(function() {
    $('.auth-box input').each(function(index, element) {
        if ($(element).val() != '') {
            $(element).prev().animate({
                top: '-20px',
                right: '6px'
            }, 180);
        }
    });


    $('.auth-box input').focus(function(e) {
        // .css('top', '-20px')
        $(e.target).prev().animate({
            top: '-20px',
            right: '6px'
        }, 180);
    });
    $('.auth-box input').focusout(function(e) {
        if ($(this).val() == '' || $(this).val() == null || !$(this).val()) {
            $(e.target).prev().animate({
                top: '8px',
                right: '17px'
            }, 180);
        }
    });
    var status = 0;
    $('.auth-box span').click(function(e) {
        $(e.target).animate({
            top: '-20px',
            right: '6px'
        }, 180);
        $(this).next().focus();
    });
    /* if file be register it will run */

    $("#auth-form").validate({

        // In 'rules' user have to specify all the 
        // constraints for respective fields
        rules: {
            name: {
                required: true,
                minlength: 5 // For length of lastname
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,

                // For checking both passwords are same or not
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
        },
        // In 'messages' user have to specify message as per rules
        messages: {
            name: {
                required: " نام کاربری الزامی است!",
                minlength: "نام کاربری باید حداقل 5 حروف باشد!"
            },
            password: {
                required: "رمز عبور الزامی می باشد!",
                minlength: "رمز عبور باید حداقل 6 حروف باشد!"
            },
            confirm_password: {
                required: "رمز عبور الزامی می باشد!",
                minlength: "رمز عبور باید حداقل 6 حروف باشد!",
                equalTo: "رمز عبور با تکرار رمز برابر نیست!"
            },
            email: {
                required: "ایمیل را باید وارد نمایید!",
                email: "ایمیل نا معتبر است"
            }
        }
    });


    /* change password type to text */
    var type = 'password';
    $('.auth-box i').click(function(e) {
        if (type == 'password') {
            $('.auth-box input[name=password]').attr('type', 'text');
            $('.auth-box input[name=confirm_password]').attr('type', 'text');
            $(this).toggleClass('fa-eye fa-eye-slash');

            type = 'text';
        } else {
            $('.auth-box input[name=password]').attr('type', 'password');
            $('.auth-box input[name=confirm_password]').attr('type', 'password');
            type = 'password';
            $(this).toggleClass('fa-eye-slash fa-eye');
        }
        console.log(type);
    });
});