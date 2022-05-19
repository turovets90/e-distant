$(document).ready(function(){

    $('.hamburger').click(function () {
        $('body').toggleClass('mm_act');
        return false;
    });

    $('.dropdown_toggler').click(function(){
        $(this).parent().toggleClass('act');
    });

    $(document).on('click', function(e) {

        if (!$(e.target).closest(".dropdown.act").length) {
            $(".dropdown.act").removeClass('act');
        }
        e.stopPropagation();
    });


    $('.tabs_nav .tab_item').each(function(){
        var tab_item=$(this).index();
        $(this).click(function(){
            console.log(tab_item);
            $('.tabs_nav .tab_item').removeClass('active');
            $('.tabs_content_list .tabs_content_item').removeClass('active');
            $(this).addClass('active');
            $('.tabs_content_list .tabs_content_item').eq(tab_item).addClass('active');
        });
    });


    $('.m_tab_item').click(function (){
        if($(this).next().is(':visible')){
            $(this).removeClass('active');
            $(this).next().slideUp();
        }else{
            $(this).addClass('active');
            $(this).next().slideDown();
        }
    });


    if($('.products_list > div').length > 3){
        $('.products_list').slick({
            slidesToShow:3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            responsive: [

                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }else if($(window).innerWidth() < 767 && $('.products_list > div').length > 1){
        $('.works_list').slick({
            autoplay: false,
            dots: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    }else if($(window).innerWidth() < 1200 && $('.products_list > div').length > 2){
        $('.works_list').slick({
            autoplay: false,
            dots: true,
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 1
        });
    }

    $('a[href^="#"]').click(function(e){
        e.preventDefault();
        var target=$(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top-10
        }, 1500);
        if($(window).innerWidth()< 991){
            $('body').removeClass('mm_act');
        }
    });


    $('.modal_toggle').click(function(){
        var target=$(this).attr('href');
        $(target).addClass('show');
        $("html").addClass('page_noscroll');

        $('.modal_close').click(function(){
            $(this).closest('.modal').removeClass('show');
            $("html").removeClass('page_noscroll');
        });
        return false;
    });

    $(document).click(function (e){
        if (!$(e.target).closest(".modal_content").length) {
            $(".modal.show").removeClass('show');
            $("html").removeClass('page_noscroll');
        }
        e.stopPropagation();

    });



    $(window).resize(function(){
        var header_height = $('header').outerHeight();
        $('body').css({'padding-top': header_height+'px'});
        $(window).scroll(function(){
            if ($(this).scrollTop() > header_height) {
                $('header').addClass('fixed');
            } else {
                $('header').removeClass('fixed');
            }

        });


    });
    $(window).resize();

    $('.show_all').click(function(){
        $(this).hide().prev().addClass('show');
    });

    $(".phone").mask("+375 (99) 999-99-99");



});





