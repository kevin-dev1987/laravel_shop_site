$(document).on('click', '#reviews-dropdown-toggle', function(){
    $('#reviews-ul').toggle(500)
})

//Close window message
$('#close-window-message').click(function(){
    $('.window-message-danger').css('display', 'none')
})

//User clicks 'helpful' on the review
$(document).on('click', '.review-helpful', function(){
    var helpful = 1
    var review_id = $(this).data('id')
    reviewHelpful(helpful, review_id)
})

//User clicks 'unhelpful' on the review
$(document).on('click', '.review-unhelpful', function(){
    var helpful = 0
    var review_id = $(this).data('id')
    reviewHelpful(helpful, review_id)
})

function reviewHelpful(helpful, review_id){
    var reviewHelpfulData = new FormData()
    reviewHelpfulData.append('id', review_id)
    reviewHelpfulData.append('helpful', helpful)


    $.ajax({
        url: '/review_helpful',
        method: 'POST',
        dataType: false,
        cache: false,
        processData: false,
        contentType: false,
        data: reviewHelpfulData,
        success: function(response){
            if(response.auth == 'not_auth'){
                $('.window-message-danger').css('display', 'flex')
                $('.window-message-danger > p').html('You must be logged in to to that!')
            }

            if(response.status == 'selection_exists'){
                $('.window-message-danger').css('display', 'flex')
                $('.window-message-danger > p').html('You\'ve already made a selection!')
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })

    console.log(reviewHelpfulData)
}