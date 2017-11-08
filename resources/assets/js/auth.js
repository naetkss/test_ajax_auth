/**
 * Created by naet on 06.11.17.
 */

function loadPage(content) {
    let urlContent = "/" + content;

    $('.content').load(urlContent, null, function () {
        addListenters();
    });
}

function register(e) {
    e.preventDefault();
    let data = $('#register-form').serialize();

    $.ajax({
        type:'POST',
        url:"/perform-register",
        data:data,
        success:function(data){
            $('.content').html(withWhiteColor('Спасибо за регистрацию. Теперь пожалуйста, авторизуйтесь'));
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('.error').html(jqXHR.responseText)
        }
    });
}

function forgotPass(e){
    e.preventDefault();
    let data = $('#forgot-pass').serialize();
    let email = $('#forgot-pass').find('#email').val();
    $.ajax({
        type: 'POST',
        url: "/password-recovery",
        data: data,
        success: function(response) {
            $('.content').load('/forgot-pass #row2', function () {
                $('#new-pass').on('submit', function (e) {
                    let changePassword = $(this).serializeArray();
                    changePassword.push({name:'email',value:email});
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "/change-password",
                        data: changePassword,
                        success: function(data) {
                            $('.content').html(withWhiteColor('Пароль был успешно изменен!'));
                            addListenters();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $('.error').html(jqXHR.responseText)
                        }
                    });
                });
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('.error').html(jqXHR.responseText)
        }
    })
}

function logIn(e) {
    e.preventDefault();
    let data = $('#login-form').serialize();
    $.ajax({
        type: 'POST',
        url: "/authenticate",
        data: data,
        success: function(data) {
            $('.content').html(data);
            $('.tool_header').load('/in', function () {
                addListenters();
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('.error').html(jqXHR.responseText);
        }
    });
}

function logOut(e) {
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: "/logout",
        success: function (data) {
            $('.content').html(data);
            $('.tool_header').load('/out', function () {
                addListenters();
            });
        }
    });
}

function addListenters() {
    $('#register-form').unbind().bind('submit',function (e) {
        register(e);
    });

    $('#login-form').unbind().bind('submit', function (e) {
        logIn(e);
    });

    $('#logout').unbind().bind('click',function (e) {
        logOut(e);
    });

    $('#forgot').unbind().bind('click', function (e) {
        e.preventDefault();
        $('.content').load('/forgot-pass #row1', function () {
            $('#forgot-pass').unbind().bind('submit', function (e) {
                forgotPass(e);
            });
        });
    });

    $('.btn-menu').unbind().bind('click', function (e) {
        e.preventDefault();
        $('.btn-menu').removeClass('active');
        $(this).toggleClass('active');
        let name = $(this).attr('id');
        loadPage(name);
    });
}

function withWhiteColor(message) {
    return '<span class="content-text">' + message + '</span>'
}

$(function() {
    addListenters();
});