$('.star-array').on('click', '.review-star', function(){
    var star = $(this)
    var index = star.index() + 1
    $('.review-star-number').html(index+'/5')
    console.log('click')
    $(this).attr('class', '.bi bi-star-fill review-star')
    $(this).prevAll().attr('class', '.bi bi-star-fill review-star')
    $(this).nextAll().attr('class', '.bi bi-star review-star')
    $('#review_rating_number').val(index)

})