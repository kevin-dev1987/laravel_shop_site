$(document).on('click', '.offer-cat-link', function(){
    var category = $(this).data('category')
    
    // var offersGetData = new FormData()
    var item_grid = $('.offer-items-grid')
    item_grid.empty()
    // offersGetData.append('category', category)

    $.ajax({
        url: '/get_offers?category=' + category,
        method: 'GET',
        dataType: false,
        context: item_grid,
        contentType: false,
        processData: false,
        cache: false,
        // data: offersGetData,
        success: function(response){
            if(response.offers){
                var offers = response.offers
                
                console.log(offers.out_of_stock)

                $.each(offers, function(index, offer){
                    if(offer.out_of_stock == true){
                        var stock = 
                        '<div class="stock-false">'+
                        'OUT OF STOCK'+
                        '</div>'
                    } else if(offer.out_of_stock == false){
                        var stock =
                        '<div class="stock-true">'+
                        'IN STOCK'+
                        '</div>'
                    }
                    var item = 
                    '<div class="item">'+
                    '<img src="'+ offer.image +'" alt="">'+
                    '<a href="#">'+ offer.name +'</a>'+
                    '<div class="footer">'+
                        '<span>£'+ offer.price +'</span>'+
                        stock +
                    '</div>'+
                    '</div>'

                    item_grid.append(item)
                })
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })
})