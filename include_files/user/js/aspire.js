$(window).on("scroll", function () {
    if ($(window).scrollTop() > 50) {
        $(".header").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".header").removeClass("active");
    }
});

$(document).ready(function () {
    $(function () {
        $(document).on('scroll', function () {
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
        $('.scroll-top-wrapper').on('click', scrollToTop);
    });
    function scrollToTop() {
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({
            scrollTop: offsetTop
        }, 500, 'linear');
    }
});
var wow = new WOW(
        {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        }
);
new WOW().init();

/*color gredient*/
var colors = new Array(
        [208, 38, 164],
        [107, 62, 219],
        [62, 191, 254],
        [208, 38, 164],
        [107, 62, 219],
        [62, 191, 254]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
var gradientSpeed = 0.001;

function updateGradient()
{

    if ($ === undefined)
        return;

    var c0_0 = colors[colorIndices[0]];
    var c0_1 = colors[colorIndices[1]];
    var c1_0 = colors[colorIndices[2]];
    var c1_1 = colors[colorIndices[3]];

    var istep = 1 - step;
    var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
    var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
    var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
    var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

    var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
    var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
    var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
    var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

    $('#gradient').css({background: "-webkit-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"})
            .css({background: "-moz-linear-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"})
            .css({background: "linear-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"});

    $('#gr').css({background: "-webkit-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"})
            .css({background: "-moz-linear-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"})
            .css({background: "linear-gradient(58deg, " + color1 + " 0%, " + color2 + " 100%)"});

    step += gradientSpeed;
    if (step >= 1)
    {
        step %= 1;
        colorIndices[0] = colorIndices[1];
        colorIndices[2] = colorIndices[3];

        //pick two new target color indices
        //do not pick the same as the current one
        colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
        colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

    }
}

setInterval(updateGradient, 10);
// Login Via Ajax
$(function ()
{
    $('#login_form').submit(function (event)
    {
        event.preventDefault();
        var submit_url = $(this).attr('action');
        var $form_inputs = $(this).find(':input');
        var form_data = {};
        $form_inputs.each(function ()
        {
            form_data[this.name] = $(this).val();
        });
        var valid_login_url = $('#valid_login_url').val();
        $.ajax(
                {
                    url: submit_url,
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function (data)
                    {
                        $('#login_message').empty();
                        $('#login_message').html('');
                        $('#login_message').removeClass('alert alert-success alert-dismissable');
                        $('#login_message').removeClass('alert alert-danger alert-dismissable');
                        if (data.login_status === true)
                        {
                            $('#login_message').addClass('alert alert-success alert-dismissable');
                            $('#login_message').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                            $('#login_message').append(data.message);
                            setTimeout(function () {
                                window.location.href = valid_login_url;
                            }, 2000);
                        } else {
                            $('#login_message').addClass('alert alert-danger alert-dismissable');
                            $('#login_message').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                            $('#login_message').append(data.message);
                        }
                    }
                });
    });
});
$(function ()
{
    $.material.init();
    $('#pincode, #mobile_no').on('change keyup', function () {
        var sanitized = $(this).val().replace(/[^-.0-9]/g, '');
        sanitized = sanitized.replace(/(.)-+/g, '$1');
        sanitized = sanitized.replace(/\.(?=.*\.)/g, '');
        $(this).val(sanitized);
    });
    $('#register_user').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            return false;
        } else {
            e.preventDefault();
            var submit_url = $(this).attr('action');
            $.ajax({
                url: submit_url,
                type: 'POST',
                data: $("#register_user").serialize(),
                dataType: 'json',
                success: function (data)
                {
                    $('#register_message').empty();
                    $('#register_message').html('');
                    $('#register_message').removeClass('alert alert-success alert-dismissable');
                    $('#register_message').removeClass('alert alert-danger alert-dismissable');
                    if (data.login_status == true)
                    {
                        $('#register_message').addClass('alert alert-success alert-dismissable');
                        $('#register_message').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                        $('#register_message').append(data.message);
                        $('#register_user')[0].reset();
                    } else {
                        $('#register_message').addClass('alert alert-danger alert-dismissable');
                        $('#register_message').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                        $('#register_message').append(data.message);
                    }
                }
            });
        }
    });
    $('#join_user').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            return false;
        } else {
            e.preventDefault();
            var submit_url = $(this).attr('action');
            $.ajax({
                url: submit_url,
                type: 'POST',
                data: $("#join_user").serialize(),
                dataType: 'json',
                success: function (data)
                {
                    $('#register_message1').empty();
                    $('#register_message1').html('');
                    $('#register_message1').removeClass('alert alert-success alert-dismissable');
                    $('#register_message1').removeClass('alert alert-danger alert-dismissable');
                    if (data.login_status == true)
                    {
                        $('#register_message1').addClass('alert alert-success alert-dismissable');
                        $('#register_message1').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                        $('#register_message1').append(data.message);
                        $('#join_user')[0].reset();
                    } else {
                        $('#register_message1').addClass('alert alert-danger alert-dismissable');
                        $('#register_message1').append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
                        $('#register_message1').append(data.message);
                    }
                }
            });
        }
    });
});

