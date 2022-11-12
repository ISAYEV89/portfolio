$('.slider-top').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    stagePadding: 400,
    dots: false,
    responsive: {
        0: {
            items: 1,
            stagePadding: 0
        },
        600: {
            items: 1,
            stagePadding: 100
        },
        800: {
            items: 1,
            stagePadding: 200

        },
        1200: {
            items: 1,
            stagePadding: 400
        }
    }
});


/////////////

$('.box-slider').owlCarousel({
    loop: true,
    margin: 36,
    nav: true,
    navText: ["<img src='assets/images/left-arrow-yellow.png' alt='' class=''>", "<img src='assets/images/right-arrow-yellow.png' alt=''>"],
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});

$('.box-slider').find('.owl-prev').append('<span class="box-slider__prev">Əvvəlki</span>');
$('.box-slider').find('.owl-next').prepend('<span class="box-slider__next"> Sonrakı</span>');

////////

$('.box-slider-white').owlCarousel({
    loop: true,
    margin: 36,
    nav: true,
    navText: ["<img src='assets/images/left-arrow-yellow.png' alt='' class=''>", "<img src='assets/images/right-arrow-yellow.png' alt=''>"],
    dots: false,
    responsive: {
        0: {
            items: 1,
            margin: 0
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});

$('.box-slider-white').find('.owl-prev').append('<span class="box-slider-white__prev">Əvvəlki</span>');
$('.box-slider-white').find('.owl-next').prepend('<span class="box-slider-white__next"> Sonrakı</span>');



let containerWidth = $('.container').width();
let windowWidth = $(window).width();
let differenceWidth = (windowWidth - containerWidth) / 2;
let containerSlideWidth = containerWidth +  differenceWidth;
$('.container-slide').css({
    'width' : containerSlideWidth + 'px',
    'margin-left' : differenceWidth + 'px'
});

if(windowWidth < 1200) {
    $('.container-slide').css({
        'width' : containerWidth + 'px',
        'margin' : '0 auto'
    });
}

$(window).resize(function () {
    let containerWidth = $('.container').width();
    let windowWidth = $(window).width();
    let differenceWidth = (windowWidth - containerWidth) / 2;
    let containerSlideWidth = containerWidth +  differenceWidth;
    $('.container-slide').css({
        'width' : containerSlideWidth + 'px',
        'margin-left' : differenceWidth + 'px'
    });

    if(windowWidth < 1200) {
        $('.container-slide').css({
            'width' : containerWidth + 'px',
            'margin' : '0 auto'
        });
    }

});

//////////////

$('.slider-author').owlCarousel({
    loop: true,
    //margin: 36,
    nav: true,
    navText: ["<img src='assets/images/left-arrow-m.png' alt='' class=''>", "<img src='assets/images/right-arrow-m.png' alt=''>"],
    dots: false,
    center: true,
    responsive: {
        0: {
            items: 1

        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});
