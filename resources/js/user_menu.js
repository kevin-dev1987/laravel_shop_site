$(document).on('click', '.user-menu > .header', function(){
    var user_menu = $(this).siblings('.menu-main')

    user_menu.toggle(150)
})



$(document).on('click', '#password_1_reveal', function(){
    $('#password').attr('type', 'text')
    $(this).attr('id', 'password_1_hide')
})

$(document).on('click', '#password_1_hide', function(){
    $('#password').attr('type', 'password')
    $(this).attr('id', 'password_1_reveal')
})


$(document).on('click', '#password_2_reveal', function(){
    $('#password2').attr('type', 'text')
    $(this).attr('id', 'password_2_hide')
})

$(document).on('click', '#password_2_hide', function(){
    $('#password2').attr('type', 'password')
    $(this).attr('id', 'password_2_reveal')
})


$(document).on('click', '#password_3_reveal', function(){
    $('#password3').attr('type', 'text')
    $(this).attr('id', 'password_3_hide')
})

$(document).on('click', '#password_3_hide', function(){
    $('#password3').attr('type', 'password')
    $(this).attr('id', 'password_3_reveal')
})