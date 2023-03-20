var displayTime = 10000

var heroSlides = ['.hero-display-1', '.hero-display-2', '.hero-display-3']

var currentSlide = 0

function nextSlide(){
    $(heroSlides[currentSlide]).fadeOut()

    currentSlide++

    if(currentSlide >= heroSlides.length){
        currentSlide = 0
    }

    $(heroSlides[currentSlide]).fadeIn()

    setTimeout(nextSlide, displayTime)
}

nextSlide()