import velocity from 'velocity-animate'

if(window.location.hash=='#toregister'){
    $('#register').addClass("visible");
    $('#login').removeClass("visible")
}
if(window.location.hash=='#tologin'){
    $('#login').addClass("visible");
}
if(window.location.hash=='#changePassword'){
    $('#login').addClass("visible");
    $('#register').removeClass("visible");
}
if(window.location.hash=='#tofullregister') {
    $('#login').addClass("visible");
    $('#register').removeClass("visible");
}


var login = document.getElementById("login");
var register = document.getElementById("register");
var changePassword = document.getElementById("changePassword");
var fullregister = document.getElementById("fullregister");


var ie = false;
if ((window.navigator.userAgent).indexOf("MSIE") > 0 || (window.navigator.userAgent).indexOf("Trident") > 0) {
    ie = true;
    login.style.opacity="1";
}


show(login);

$("#to_reset_pass").click(function () {
    return false; // todo Удалить для работы регистрации + востановление пароля
    hide(login);
    show(changePassword);

});

$("#create-acc").click(function () {
    return false; // todo Удалить для работы регистрации + востановление пароля
    hide(login);
    show(register);

});

$("#create-acc-full").click(() => {
    $('.login-block').removeClass('hidden');
    $('#create-acc-full').addClass('hidden');
    $('.register-link').show();

});

$('.register-link').click(function () {
    $('.login-block').addClass('hidden');
    $('.register-link').hide();
    $('#create-acc-full').removeClass('hidden');
});

$(".login_link").click(function () {
    hide(register);
    hide(changePassword);
    show(login)
});

$("#slider-login").click(function () {
    if (document.getElementById("login").style.display != 'none') return;
    hide(register);
    hide(changePassword);
    show(login)
});

$("#slider-register").click(function () {
    if (document.getElementById("register").style.display != 'block') {
        hide(login);
        hide(changePassword);
        show(register)
    }
    ;

});


// $(".to_register").click(function () {
//
//     // $('#register').addClass("visible");
//     // $('#login').removeClass("visible");
//     // $('#changePassword').removeClass("visible");
//     // $('#fullregister').removeClass("visible");
//
//     hide(login)
//     show(register);
// });

// $(".login_link").click(function () {
//
//     // $('#register').removeClass("visible");
//     hide(register);
//     // $('#login').addClass("visible");
//     show(login);
//     $('#changePassword').removeClass("visible");
//     $('#fullregister').removeClass("visible");
//     $('.register-link').show();
// });
// $("#logIn").click(function () {
//
//     // $('#register').removeClass("visible");
//     // $('#login').addClass("visible");
//     // $('#changePassword').removeClass("visible");
//     // $('#fullregister').removeClass("visible");
//     hide(changePassword);
//     // hide(register)
//     show(login)
//     register.style.display="none"
// });
//
// $("#create-acc-full").click(function () {
//     $('.login-block').removeClass('hidden');
//     $('#create-acc-full').addClass('hidden');
//     $('.register-link').show();
// });
// $('.register-link').click(e => {
//     $('.login-block').addClass('hidden');
//     $('.register-link').hide();
//     $('#create-acc-full').removeClass('hidden');
// })


function hide(elem) {
        //todo раскомментировать, когда понадобится регистрация
    elem.style.display = "none";
    if (!ie) elem.velocity({left: "-25px", opacity: 0, display: "none"}, {duration: 300});


}

function show(elem) {
    //todo раскомментировать, когда понадобится регистрация

    if (!ie) elem.velocity({left: "0px", opacity: 1, display: "block"}, {duration: 300});
    else {
        elem.style.display = 'block';
        elem.style.opacity="1";
    }
}

// //слайдер
//
//
// // $('.slider').slick({
// //     autoplay:true,
// //     arrows:false,
// //     dots: true,
// //     infinite: true,
// //     speed: 800,
// //     cssEase: 'linear'
// // });
// //
// // $('.slider').on('beforeChange', function (slick, currentSlide) {
// //
// // // console.log( Array.from($(".slick-dots li.slick-active ")));
// //     // $(".slick-dots li.slick-active button").css("background-color", 'red')
// //    // Array.from($('.slick-dots li button')).forEach(function (item) {
// //    //      console.log(item.getAttribute('aria-label')[0])
// //    //     console.log("+++++  "+currentSlide.currentSlide);
// //    //    if(item.getAttribute('aria-label')[0]==currentSlide.currentSlide)item.classList.add('button_active');
// //    //    else{
// //    //        item.classList.remove('button_active')
// //    //    }
// //    // })
// // });
//
// ///////////////
//
//
//
//
//
// // $(document).ready(function(){
// //     $('form').submit(function(e){
// //         let action,data,self;
// //         self = this;
// //         e.preventDefault();
// //         action = $(self).attr('action');
// //         data = $(self).serialize();
// //         $.ajax({
// //             url: action,
// //             data: data,
// //             method: 'POST',
// //             success: function(data){
// //                 $(self).children('.msg').removeClass('error').removeClass('success');
// //                 if(data.type === 'error'){
// //                     $(self).children('.msg').html(data.status).addClass('error');
// //                 }else if (data.type ==='success'){
// //                     $(self).children('.msg').html(data.status).addClass('success');
// //                 }
// //                 if(data.redirect){
// //                     window.location = data.redirect;
// //                 }
// //             }
// //         })
// //     })
// // });
//
