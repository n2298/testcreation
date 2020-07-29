
jQuery(window).load(function(){
  var loader_container = jQuery('.rt-cube-grid');
    var loader = jQuery('.rt-preloader-wrapper');
    var loader_delay = 100;
    // Loader
    loader_container.delay(loader_delay, function(){
        loader.delay(loader_delay).fadeOut("slow");
    }).fadeOut();
});


jQuery(document).ready(function ($) {

    // Init and Decleration.
    var back_to_top = $('.back-to-top');
    
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');

    // Back to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            back_to_top.css({ bottom: "25px" });
        }
        else {
            back_to_top.css({ bottom: "-100px" });
        }
    });

    back_to_top.click(function (e) {
        e.preventDefault();
        var scroll_speed = edu_axis.scroll_speed;
        scroll_speed = scroll_speed ? parseInt(scroll_speed ) : 1000;
        $('html, body').animate({ scrollTop: '0px' }, scroll_speed);
        return false;
    });

    // Main Menu
    menu_toggle.click(function () {
        nav_menu.fadeToggle();
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('.menu-overlay').toggleClass('active');
    });

    var siteNavigationId=null;
    $('body').keyup(function (e) {
        var code = e.keyCode || e.which;

        if (code == '9') {
            navigationFocusChange(e);
        }

    });

    $('body').click(function (e) {
        navigationFocusChange(e);
    });

    function navigationFocusChange(e) {
        if (!siteNavigationId) {
            siteNavigationId = $(e.target).closest('.main-navigation').attr('id');
            return;
        }
        if (siteNavigationId != $(e.target).closest('.main-navigation').attr('id')) {
            console.log(siteNavigationId)

            nav_menu.hide();
            menu_toggle.removeClass('active');
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            $('.main-navigation .sub-menu').hide()
            siteNavigationId = null;
        }
    }

    $(document).on( 'click', '.main-navigation button.dropdown-toggle', function() {
        $(this).toggleClass('active');
        $(this).parent().siblings().find('.sub-menu').hide();
        $(this).parent().find('.sub-menu').first().slideToggle();
    } );

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            $('.modern-menu #site-navigation').removeClass('menu-open');
            $('.modern-menu #primary-menu').hide();
            $('.modern-menu .menu-overlay').removeClass('active');
            $('.menu-toggle').removeClass('active');
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.modern-menu #site-navigation').removeClass('menu-open');
            $('.modern-menu #primary-menu').hide();
            $('.modern-menu .menu-overlay').removeClass('active');
            $('.menu-toggle').removeClass('active');
        }
    });

    // Sticky Menu
    var navbarHeight = $('#masthead').height();
    $(window).scroll(function(){
        if($(window).scrollTop() > 32){
            $('.sticky-menu').addClass('stick-at');
        }else{
            $('.sticky-menu').removeClass('stick-at');
        }
    })

    $( '.menu-item-has-children > a' ).after('<button class="dropdown-toggle"><svg viewBox="0 0 129 129"><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path></svg></button>' );

    // $('.hentry .entry-header').matchHeight();
    $( 'section#featured-posts article' ).matchHeight();

    // header search
    $(document).on('click', '.rt-header-search .rt-top-search', function(){
        // $(this).toggleClass( 'search-open' );

        if ( $(this).hasClass( 'search-open' ) ) {
            $(this).removeClass('search-open').find( 'i' ).removeClass('fa-times').addClass('fa-search');
            $('.top-search-form').addClass('hidden');
        } else {
            $(this).addClass('search-open').find( 'i' ).removeClass('fa-search').addClass('fa-times');
            $('.top-search-form').removeClass('hidden');
        }
    })

});