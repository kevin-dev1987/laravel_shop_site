$('#reg-agree-input').prop('checked', false)
$(document).on('click', '#reg-agree-input', function(){
    var checkmark = $(this).siblings('label').find('.reg-agree-checkmark')
    checkmark.toggle()
})