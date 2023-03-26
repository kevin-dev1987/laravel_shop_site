$(document).on('click', '#reviews-dropdown-toggle', function(){
    $('#reviews-ul').toggle(500)
})

//Close window message
$('.close-window-message').click(function(){
    $('.window-message-danger').css('display', 'none')
    $('.window-message-success').css('display', 'none')
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

            if(response.status == 'success'){
                $('.window-message-success').css('display', 'flex')
                $('.window-message-success > p').html('Thank you for you\'re input!')
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })

    console.log(reviewHelpfulData)
}

//Report review
$(document).on('click', '.review-report', function(){
    var user = $(this).data('user')
    var id = $(this).data('review_id')

    var modal = $('.review-report-modal')
    modal.show()
    var modal_title = modal.find('.modal-content > p > strong')
    modal_title.html(user)
    var input_review_id = $('#input_review_id')
    input_review_id.val(id)
})


$(document).on('click', '.cancel-review-report', function(e){
    e.preventDefault()
    $('.review-report-modal').hide()
})

var review_report_form = $('#report-review-form')[0]
$(document).on('click', '.submit-review-report', function(e){
    e.preventDefault()
    var reviewReportData = new FormData(review_report_form)
    reviewReportData.append('type', 'review')

    $.ajax({
        url: '/review_report',
        method: 'POST',
        processData: false,
        cache: false,
        dataType: false,
        contentType: false,
        data: reviewReportData,
        success: function(response){
            if(response.input == 'empty'){
                $('.review-report-errors').show()
                $('.review-report-errors').html('Please select a reason.')
            }

            if(response.auth == 'not_auth'){
                $('.review-report-errors').show()
                $('.review-report-errors').html('You must be logged in to do this.')
            }

            if(response.status == 'success'){
                $('.review-report-modal').hide()
                $('.window-message-success').css('display', 'flex')
                $('.window-message-success > p').html('You\'re report has been submitted!')
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })

})