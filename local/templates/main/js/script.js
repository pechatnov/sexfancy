var pattern_name = /^[а-яА-ЯёЁa-zA-Z0-9\s]+$/;
var pattern_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

function main_scripts(){


    $(".lazy").lazyload({
        effect : "fadeIn"
    });
    $(".lazy_gif").lazyload({
        effect : "fadeIn",
        placeholder : "/local/templates/main/img/grey.gif"
    });

    $(".customScroll").mCustomScrollbar();

    $('.site_map .item i').on('click', function(e){

        e.preventDefault();
        $(this).parents('.hidden_child').toggleClass('active');
        $(this).parents('.hidden_child').children('.block').slideToggle();
    });

    $('header .menu .block .item').hover(function(){

        $('#wrapper').addClass('area_overlay');
    },function(){

        $('#wrapper').removeClass('area_overlay');
    });


    $('.poster .block').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        arrows: false,
        autoplay: true,
        speed: 1500,
        autoplaySpeed: 5000
    });


    $('.popul .block').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: true,
        responsive: [
            {
                breakpoint: 1259,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.brands .block').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 1000,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1260,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    arrows: false,
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2
                }
            }
        ]
    });

    $('.detail_page .big_img .block').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.detail_page .mini_img .block',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: true
                }
            }
        ]
    });
    $('.detail_page .mini_img .block').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.detail_page .big_img .block',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        vertical: true,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    arrows: true,
                    vertical: false
                }
            }
        ]
    });


    //article
    $(".article .block").slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        speed: 2000,
        autoplaySpeed: 6000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                }
            }
        ]
    });
    /*function slick_320(){
        var sliders = $(".divisions .block");
        if(!sliders.hasClass('slick-slider')){
            $(sliders).slick({
                dots: false,
                arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                centerMode: true
            });
        }
    }
    function delite_slick(){
        $(".divisions .slick-slider").slick('unslick');
    }
    if($(window).width() < 768){
        slick_320();
    }else{
        delite_slick();
    }
    $(window).resize(function(){
        if($(window).width() < 768){
            slick_320();
        }else{
            delite_slick();
        }
    });*/


    //detail_page
    $('.detail_page .colors a, .detail_page .sizes a').on('click', function(e){

        e.preventDefault();


        $(this).parent().children().removeClass('active');
        $(this).addClass('active');
    });

    //select color
    //detail_page
    $('.detail_page .colors a').on('click', function(e){

        e.preventDefault();

        var color = $(this).attr('href');

        $('.descr_block .sizes').removeClass('active');
        $('.descr_block .sizes[color_code = ' + color + ']').addClass('active');
    });

    $('.detail_page .colors a, .detail_page .sizes a').on('click', function(e){

        e.preventDefault();


        var id_product = $('.detail_page .id_product').val();
        var color = $('.detail_page .colors a.active').attr('href');
        var size = $('.detail_page .sizes.active a.active').attr('href');

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/sku_price.php",
            data: ({
                "id_product": id_product,
                "color": color,
                "size": size
            }),
            success: function (id) {
                $('.descr_block .price span').removeClass('active');
                $('.descr_block .price span[offerid = ' + id + ']').addClass('active');
            }
        });
    });


    //aside filter
    $('.filter .colors a').on('click', function(e){

        $(this).toggleClass('active');
    });





    //height
    function window_min_height(){

        var window_H = $(window).height();
        var wrapper_H = $('#wrapper').height();
        var header_H = $('header').height();
        var footer_H = $('footer').height();
        var add_Height = window_H - header_H - footer_H;
        if(window_H > wrapper_H){
            $('.main_content').css('min-height', add_Height + 'px');
        }
    }

    window_min_height();


    //menu
    $('#btn_1000').on('click', function(e){

        e.preventDefault();
        $(this).parents('.menu').toggleClass('active');
    });
    $('#btn_320').on('click', function(e){

        e.preventDefault();
        $(this).parent().addClass('active');
    });
    $('#ic_close, #close_area_320').on('click', function(e){

        $(this).parents('.menu_320').removeClass('active');
    });
    $('header .menu_320 .wrap .item i.main_arr').on('click', function(){

        $(this).parents('.item').toggleClass('active');
        //$(this).parents('.item').children('.sub_block').slideToggle();
    });
    $('header .menu_320 .wrap .sub_item i.sub_arr').on('click', function(){

        $(this).parents('.sub_item').toggleClass('active');
        //$(this).parents('.sub_item').children('.sub_sub_block').slideToggle();
    });


    //scroll
    var hs_header = $('header').height();
    $(window).scroll(function(){
        if ($(document).scrollTop() > $('header').height()) {
            $('header').addClass('scroll');
            $('#buffer').css('height', hs_header + 'px');
        } else {
            $('header').removeClass('scroll');
            $('#buffer').css('height', 0 + 'px');
        }
    });


    //search
    $('#search').on('click', function(e){

        e.preventDefault();

        $(this).parent().addClass('active');
    });


    //fancybox
    $(".fancy").fancybox({
        padding: 0,
        helpers : {
            overlay : {
                locked : false
            }
        }
    });


    $('.accordion_block .hat').on('click', function(){

        $(this).parent().toggleClass('active');
        $(this).parent().children('.inner').slideToggle();
    });


    $('#table_size').on('click', function(){

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/table_size.html",
            success: function (a) {
                $.fancybox(a, {
                    fitToView: false,
                    padding: 0,
                    helpers	: {
                        overlay : {
                            locked : false
                        }
                    }
                });
            }
        });
    });

    $('#cancel_order_btn').on('click', function(e){

        e.preventDefault();
        $(this).parent().children('input[type=submit]').click();
    });

    $('.registr .reg_btn a').on('click', function(e){

        e.preventDefault();
        $(this).parent().children('input[type=submit]').click();
    });

    $('.personal_area .personal_accaunt .refill .sub_block .item').on('click', function(){

        $(this).parent().children().removeClass('active');
        $(this).addClass('active');
    });
    $('.personal_area .buttons_s a').on('click', function(e){

        e.preventDefault();

        var name = $(this).attr('name');
        $(this).parent().children('input[name='+name+']').click();
    });

    $('.cookie_info .btn_close').on('click', function(){

        $(this).parent().removeClass('active');
    });


    //menu lk article
    $('.personal_area .sidebar_lk .title span').on('click', function(){


        $(this).parents('.sidebar_lk').toggleClass('active');
        $(this).parents('.sidebar_lk').children('.block').slideToggle();
    });

    $('.article_detail .list_artic .title span').on('click', function(){


        $(this).parents('.list_artic').toggleClass('active');
        $(this).parents('.list_artic').children('.block').slideToggle();
    });

}



$(document).scroll(function(){

    $('#search').parent().removeClass('active');
    $('header .menu').removeClass('active');
});


//remove restore
$(document).on("click", "span[data-entity='basket-item-delete']", function(e){


    setTimeout(
        function(){
            e.preventDefault();
            $('#refresh_basket').click();
            BX.closeWait();
        },
        1000
    );
});
$(document).on("click", "a[data-entity='basket-item-restore-button']", function(e){

    setTimeout(
        function(){
            e.preventDefault();
            $('#refresh_basket').click();
            BX.closeWait();
        },
        1000
    );

});
//add basket detail
$(document).on("click", "a.cont", function(e){

    e.preventDefault();
    $.fancybox.close();
});
$(document).on("click", ".detail_page .buy a", function(e){
    e.preventDefault();

    var id_scu_1 = $('.detail_page .id_scu_1').val();

    var id_product = $('.detail_page .id_product').val();
    var color = $('.detail_page .colors a.active').attr('href');
    var size = $('.detail_page .sizes.active a.active').attr('href');

    $.ajax({
        type: "POST",
        url: "/local/templates/main/ajax/basket_detail_page.php",
        data: ({
            "id_scu_1": id_scu_1,
            "id_product": id_product,
            "color": color,
            "size": size
        }),
        success: function (a) {

            $('#refresh_basket').click();
            BX.closeWait();

            $.fancybox(a, {
                fitToView: false,
                padding: 0,
                helpers	: {
                    overlay : {
                        locked : false
                    }
                }
            });
        }
    });
});


$(document).on("click", ".fast_buy .buy a", function(e){
    e.preventDefault();

    var id_scu_1 = $('.fast_buy .id_scu_1').val();

    var id_product = $('.fast_buy .id_product').val();
    var color = $('.fast_buy .colors a.active').attr('href');
    var size = $('.fast_buy .sizes.active a.active').attr('href');

    $.ajax({
        type: "POST",
        url: "/local/templates/main/ajax/basket_detail_page.php",
        data: ({
            "id_scu_1": id_scu_1,
            "id_product": id_product,
            "color": color,
            "size": size
        }),
        success: function (a) {

            $('#refresh_basket').click();
            BX.closeWait();

            $.fancybox(a, {
                fitToView: false,
                padding: 0,
                helpers	: {
                    overlay : {
                        locked : false
                    }
                }
            });
        }
    });
});
//fast_buy.php
$(document).on("click", ".catalog_list a.basket", function(e){
    e.preventDefault();

    var id_product = $(this).parents('.product').children('.id_product').val();
    var count_offers = $(this).parents('.product').children('.count_offers').val();

    if(count_offers == 1){

        var id_scu_1 = $(this).parents('.product').children('.id_scu_1').val();

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/basket_detail_page.php",
            data: ({
                "id_scu_1": id_scu_1,
                "id_product": id_product
            }),
            success: function (a) {

                $('#refresh_basket').click();
                BX.closeWait();

                $.fancybox(a, {
                    fitToView: false,
                    padding: 0,
                    helpers	: {
                        overlay : {
                            locked : false
                        }
                    }
                });
            }
        });
    }
    else{

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/fast_buy.php",
            data: ({
                "id_product": id_product
            }),
            success: function (a) {
                $.fancybox(a, {
                    fitToView: false,
                    padding: 0,
                    helpers	: {
                        overlay : {
                            locked : false
                        }
                    }
                });
            }
        });
    }


});
$(document).on("click", ".popul a.basket", function(e){
    e.preventDefault();

    var id_product = $(this).parents('.product').children('.id_product').val();
    var count_offers = $(this).parents('.product').children('.count_offers').val();

    if(count_offers == 1){

        var id_scu_1 = $(this).parents('.product').children('.id_scu_1').val();

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/basket_detail_page.php",
            data: ({
                "id_scu_1": id_scu_1,
                "id_product": id_product
            }),
            success: function (a) {

                $('#refresh_basket').click();
                BX.closeWait();

                $.fancybox(a, {
                    fitToView: false,
                    padding: 0,
                    helpers	: {
                        overlay : {
                            locked : false
                        }
                    }
                });
            }
        });
    }
    else{

        $.ajax({
            type: "POST",
            url: "/local/templates/main/ajax/fast_buy.php",
            data: ({
                "id_product": id_product
            }),
            success: function (a) {
                $.fancybox(a, {
                    fitToView: false,
                    padding: 0,
                    helpers	: {
                        overlay : {
                            locked : false
                        }
                    }
                });
            }
        });
    }
});

//sort
$(document).on("click", ".sort_link a", function(e){

    e.preventDefault();

    var type = $(this).attr('type');
    var val = $(this).attr('val');

    $.ajax({
        type: "POST",
        url: "/local/templates/main/ajax/catalog_sort.php",
        data: ({
            "TYPE": type,
            "VAL": val,
        }),
        success: function (res) {
            //console.log(res);
            $('#refresh_section').click();
        }
    });
});


//subscribe
$(document).on("click", "#subscribe_link", function(e){

    e.preventDefault();

    $('html, body').animate({
        scrollTop: $('#sender-subscribe').offset().top
    }, 2000);
});


$(document).ready(function(){

    main_scripts();
});












var lastWait = [];
/* non-xhr loadings */
BX.showWait = function (node, msg)
{
    node = BX(node) || document.body || document.documentElement;
    msg = msg || BX.message('JS_CORE_LOADING');

    var container_id = node.id || Math.random();

    var obMsg = node.bxmsg = document.body.appendChild(BX.create('DIV', {
        props: {
            id: 'wait_' + container_id,
            className: 'bx-core-waitwindow'
        },
        text: msg
    }));

    setTimeout(BX.delegate(_adjustWait, node), 10);

    $('#win8_wrapper').show();
    lastWait[lastWait.length] = obMsg;
    return obMsg;
};

BX.closeWait = function (node, obMsg)
{
    $('#win8_wrapper').hide();
    if (node && !obMsg)
        obMsg = node.bxmsg;
    if (node && !obMsg && BX.hasClass(node, 'bx-core-waitwindow'))
        obMsg = node;
    if (node && !obMsg)
        obMsg = BX('wait_' + node.id);
    if (!obMsg)
        obMsg = lastWait.pop();

    if (obMsg && obMsg.parentNode)
    {
        for (var i = 0, len = lastWait.length; i < len; i++)
        {
            if (obMsg == lastWait[i])
            {
                lastWait = BX.util.deleteFromArray(lastWait, i);
                break;
            }
        }

        obMsg.parentNode.removeChild(obMsg);
        if (node)
            node.bxmsg = null;
        BX.cleanNode(obMsg, true);
    }
};

function _adjustWait()
{
    if (!this.bxmsg)
        return;

    var arContainerPos = BX.pos(this),
        div_top = arContainerPos.top;

    if (div_top < BX.GetDocElement().scrollTop)
        div_top = BX.GetDocElement().scrollTop + 5;

    this.bxmsg.style.top = (div_top + 5) + 'px';

    if (this == BX.GetDocElement())
    {
        this.bxmsg.style.right = '5px';
    }
    else
    {
        this.bxmsg.style.left = (arContainerPos.right - this.bxmsg.offsetWidth - 5) + 'px';
    }
}
