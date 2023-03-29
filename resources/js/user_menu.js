
$(document).on('click', '.user-menu > .header', function(){
    var user_menu = $(this).siblings('.menu-main')

    user_menu.toggle(150)
})


//Update user information
var updateForm = $('#update-user-form')[0]
$(document).on('click', '.update-user-btn', function(e){
    e.preventDefault()
    var userUpdateData = new FormData(updateForm)
    $('.user-update-error').html('')

    console.log(userUpdateData)
    $.ajax({
        url: '/update_user',
        method: 'POST',
        contentType: false,
        dataType: 'json',
        processData: false,
        cache: false,
        data: userUpdateData,
        success: function(response){

            if(response.status == 'error'){

                // Update the HTML to show that the form was successfully submitted
                var errors = response.errors
                console.log(errors)
                $.each(errors, function(field, messages){
                    var errorDiv = $('[data-error="' + field + '"]')
                    errorDiv.empty()
                    $.each(messages, function(index, message) {
                        errorDiv.append(message + '<br>'); // append each error message with a line break
                    });
                });
            }
 

            if(response.status == 'success'){
                Swal.fire(
                    'Success!',
                    response.message,
                    'success'
                )
            }
            


        },
        error: function(xhr, status, error){
            console.log(error)
        }
        
    })

})

var passUpdateForm = $('#user-password-update')[0]
$(document).on('click', '.update-user-password', function(e){
    e.preventDefault()
    $('.user-update-error').html('')

    var updatePasswordData = new FormData(passUpdateForm)

    $.ajax({
        url: '/update_user',
        method: 'POST',
        cache: false,
        contentType: false,
        dataType: 'json',
        processData: false,
        data: updatePasswordData,
        success: function(response){

            if(response.status == 'error'){

                // Update the HTML to show that the form was successfully submitted
                var errors = response.errors
                console.log(errors)
                $.each(errors, function(field, messages){
                    var errorDiv = $('[data-error="' + field + '"]')
                    errorDiv.empty()
                    $.each(messages, function(index, message) {
                        errorDiv.append(message + '<br><br>'); // append each error message with a line break
                    });
                });
            }

            if(response.pwd_check == 'fail'){
                $('#pwd_update_conf_error').html(response.message)
            }
 

            if(response.status == 'success'){
                Swal.fire(
                    'Success!',
                    response.message,
                    'success'
                )
            }
            


        },
    })

    console.log(updatePasswordData)
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