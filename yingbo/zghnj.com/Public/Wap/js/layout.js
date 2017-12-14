$(function () {
    //-------- 判断分辨率 --------
    $(window).load(function () {
        positioncont();
        $(window).resize(function () {
            positioncont();
        })
    })

    function positioncont() {
        /*产品详情---相关产品*/
        var swiper = new Swiper('.probebox', {
            pagination: '',
            nextButton: '.proright',
            prevButton: '.proleft',
            paginationClickable: true,
            slidesPerView:1,
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5
                }
            }
        });
    };

})












