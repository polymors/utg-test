$(function () {

        $(".featured-products").slick({

            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: true,
            dots: true,
            infinite: true,
            centerMode: false,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                  }
                },
                {
                    breakpoint: 576,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      arrows: false,
                    }
                  }
            ],

        });



});