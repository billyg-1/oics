jQuery.noConflict();

jQuery(document).ready(function($){  
    "use strict";

    var currentWidth = window.innerWidth || document.documentElement.clientWidth;


    if(currentWidth < 1200) {
        $('.product-layout-controller').parents('.product-loop-sorting-item').addClass('hidden');
        $('.product-display-controller').parents('.product-loop-sorting-item').addClass('hidden');
    }

    if($('#primary').hasClass('page-with-sidebar')) {
        $('.product-layout-controller').parents('.product-loop-sorting-item').addClass('hidden');
        $('.product-display-controller').parents('.product-loop-sorting-item').addClass('hidden');
    }


    // On window resize
    $(window).resize(function() {

        // Title Element Group Highlighter
        $('.product-style-title-eg-highlighter li').each(function() {
        
            var first_item = $(this).find('.product-element-group-wrapper .product-element-group-items:first').height();
            var second_item = $(this).find('.product-element-group-wrapper .product-element-group-items:nth-child(2)').height();

            var max_height = Math.max(first_item, second_item);

            jQuery(this).find('.product-element-group-wrapper').css('height', max_height);
            
        });


        // Equal Height for Product Listing
        $('ul.products').each(function() {
            if(!$(this).hasClass('swiper-wrapper')) {
                $(this).find('.dt-col').matchHeight({
                    byRow: true,
                    property:'height'
                });
            }
        });

    });



    // Title Element Group Highlighter
    $('.product-style-title-eg-highlighter li').each(function() {
     
        var first_item = $(this).find('.product-element-group-wrapper .product-element-group-items:first').height();
        var second_item = $(this).find('.product-element-group-wrapper .product-element-group-items:nth-child(2)').height();

        var max_height = Math.max(first_item, second_item);

        jQuery(this).find('.product-element-group-wrapper').css('height', max_height);
        
    });


    // Equal Height for Product Listing
    $('ul.products').each(function() {
        if(!$(this).hasClass('swiper-wrapper')) {
            $(this).find('.dt-col').matchHeight({
                byRow: true,
                property:'height'
            });
        }
    });


    // Product Change Layout
    if( $('.product-change-layout').length ){
        $('.product-change-layout').find('span').on('click', function(e){

            var this_item = $(this);

            this_item.parents('.container').find('ul.products').addClass('product-loader');


            this_item.parents('.product-change-layout').find('span').removeClass('active');
            this_item.addClass('active');

            if(this_item.parents('section').hasClass('page-with-sidebar')) {

                var $column = this_item.data('column');
                if($column == 1) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12';                
                } else if($column == 2) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-6 dt-col-qxlg-6 dt-col-lg-6'; 
                } else if($column == 3) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4'; 
                } else if($column == 4) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4';                                       
                }

            } else {

                var $column = this_item.data('column');
                if($column == 1) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12';                
                } else if($column == 2) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-6 dt-col-hxlg-6 dt-col-lg-6'; 
                } else if($column == 3) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4'; 
                } else if($column == 4) {
                    var $column_class = 'dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3';                                       
                }

            }

            var $holder = this_item.parents('.container').find('ul.products .dt-col');

            $holder.removeClass('dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-6 dt-col-qxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-6 dt-col-hxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3 first');
            $holder.addClass($column_class);
     
            setTimeout( function(){

                this_item.parents('.container').find('ul.products').removeClass('product-loader');

                $('ul.products').each(function() {
                    if(!$(this).hasClass('swiper-wrapper')) {
                        $(this).find('.dt-col').matchHeight({
                            byRow: true,
                            property:'height'
                        });
                    }
                });

            }, 600 ); 

            e.preventDefault();

        });
    } 

    // Product List Options
    if( $('.product-list-options').length ){
        $('.product-list-options').find('span').on('click', function(e){

            var this_item = $(this);

            this_item.parents('.container').find('ul.products').addClass('product-loader');


            this_item.parents('.product-list-options').find('span').removeClass('active');
            this_item.addClass('active');

            
            var $list_option = this_item.data('list-option');
            if($list_option == 'right-thumb') {
                var $list_option_class = 'product-list-right-thumb';
            } else {
                var $list_option_class = 'product-list-left-thumb';
            }

            var $holder = this_item.parents('.container').find('ul.products li.product:not(.product-category)');

            $holder.removeClass('product-list-left-thumb product-list-right-thumb');
            $holder.addClass($list_option_class);
        
            setTimeout( function(){

                this_item.parents('.container').find('ul.products').removeClass('product-loader');

                $('ul.products').each(function() {
                    if(!$(this).hasClass('swiper-wrapper')) {
                        $(this).find('.dt-col').matchHeight({
                            byRow: true,
                            property:'height'
                        });
                    }
                });

            }, 600 ); 

            e.preventDefault();

        });
    } 

    // Product Change Display View
    if( $('.product-change-display').length ){
        $('.product-change-display').find('span').on('click', function(e){

            var this_item = $(this);

            this_item.parents('.container').find('ul.products').addClass('product-loader');

            this_item.parents('.product-change-display').find('span').removeClass('active');
            this_item.addClass('active');

            var $display = this_item.data('display');

            if($display == 'list') {
                this_item.parents('.product-loop-sorting').find('.product-layout-controller').addClass('hidden');
                this_item.parents('.product-loop-sorting').find('.product-list-options-controller').removeClass('hidden');
            } else {
                this_item.parents('.product-loop-sorting').find('.product-layout-controller').removeClass('hidden');
                this_item.parents('.product-loop-sorting').find('.product-list-options-controller').addClass('hidden');
            }
            this_item.parents('.product-loop-sorting').find('.product-change-layout span').removeClass('active');
            this_item.parents('.product-loop-sorting').find('.product-change-layout span[data-column=4]').addClass('active');

            this_item.parents('.product-loop-sorting').find('.product-list-options span').removeClass('active');
            this_item.parents('.product-loop-sorting').find('.product-list-options span[data-list-option=left-thumb]').addClass('active');


            var $holder = this_item.parents('.container').find('ul.products li.product');

            $.each( $holder, function( i, val ) {

                $(val).removeClass('product-grid-view product-list-view product-list-left-thumb product-list-right-thumb');

                if(($display == 'list' && $(val).hasClass('product-category')) || $display == 'grid') {

                    $(val).addClass('product-grid-view');

                    $(val).find('.dt-col').removeClass('dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-6 dt-col-qxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-6 dt-col-hxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3 first');

                    if(this_item.parents('section').hasClass('page-with-sidebar')) {
                        $(val).find('.dt-col').addClass('dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4');
                    } else {
                        $(val).find('.dt-col').addClass('dt-col dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3');
                    }                   

                } else {

                    $(val).addClass('product-list-view product-list-left-thumb');

                    $(val).find('.dt-col').removeClass('dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-6 dt-col-qxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-6 dt-col-hxlg-6 dt-col-lg-6 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4 dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3 first');
                    $(val).find('.dt-col').addClass('dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12');

                }

            });


            setTimeout( function(){

                this_item.parents('.container').find('ul.products').removeClass('product-loader');

                $('ul.products').each(function() {
                    if(!$(this).hasClass('swiper-wrapper')) {
                        $(this).find('.dt-col').matchHeight({
                            byRow: true,
                            property:'height'
                        });
                    }
                });

            }, 600 ); 

            e.preventDefault();

        });
    } 

    /// After adding product to cart
    $('body').on('added_to_cart', function(e) {

        if($('.dt-sc-shop-cart-widget').hasClass('activate-sidebar-widget')) {

            $('.dt-sc-shop-cart-widget').addClass('dt-sc-shop-cart-widget-active');
            $('.dt-sc-shop-cart-widget-overlay').addClass('dt-sc-shop-cart-widget-active');

            // Nice scroll script

            var winHeight = $(window).height();
            var headerHeight = $('.dt-sc-shop-cart-widget-header').height();
            var footerHeight = $('.woocommerce-mini-cart-footer').height();

            var height = parseInt((winHeight-headerHeight-footerHeight), 10);

            $('.dt-sc-shop-cart-widget-content').height(height).niceScroll({ cursorcolor:"#000", cursorwidth: "5px", background:"rgba(20,20,20,0.3)", cursorborder:"none" });

        }
        
        if($('.dt-sc-shop-cart-widget').hasClass('cart-notification-widget')) {

            $('.dt-sc-shop-cart-widget').addClass('dt-sc-shop-cart-widget-active');
            $('.dt-sc-shop-cart-widget-overlay').addClass('dt-sc-shop-cart-widget-active');            
            setTimeout( function(){
                $('.dt-sc-shop-cart-widget').removeClass('dt-sc-shop-cart-widget-active');
                $('.dt-sc-shop-cart-widget-overlay').removeClass('dt-sc-shop-cart-widget-active');
            }, 2400 );   

        }

        e.preventDefault();
    }); 


    $('body').on('click', '.dt-sc-shop-cart-widget-close-button, .dt-sc-shop-cart-widget-overlay', function( e ) {
        $('.dt-sc-shop-cart-widget').removeClass('dt-sc-shop-cart-widget-active');
        $('.dt-sc-shop-cart-widget-overlay').removeClass('dt-sc-shop-cart-widget-active');
        e.preventDefault();
    });


    // Single page variable product add to cart option
    $('body').on('click', '.dt-sc-shop-single-sticky-addtocart-section a.product_type_variable.add_to_cart_button', function (e) {
        $('html, body').animate({
            scrollTop: $('.summary.entry-summary').offset().top
        }, 800);
        e.preventDefault();
    });


    // Single page add to cart sticky
    var stickyAddToCartToggle = function () {

        var $trigger = $('.entry-summary .cart');
        var $stickyBtn = $('.dt-sc-shop-single-sticky-addtocart-container');

        if ($stickyBtn.length <= 0 || $trigger.length <= 0 || ($(window).width() <= 768 && $stickyBtn.hasClass('mobile-off'))) return;

        var summaryOffset = $trigger.offset().top + $trigger.outerHeight();
        var $scrollToTop = $('#toTop');

        var windowScroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();

        if (summaryOffset < windowScroll && windowScroll + windowHeight != documentHeight) {
            $stickyBtn.addClass('dt-sc-shop-sticky-enabled');
            $scrollToTop.addClass('dt-sc-shop-sticky-enabled');

        } else if (windowScroll + windowHeight == documentHeight || summaryOffset > windowScroll) {
            $stickyBtn.removeClass('dt-sc-shop-sticky-enabled');
            $scrollToTop.removeClass('dt-sc-shop-sticky-enabled');
        }

    };

    stickyAddToCartToggle();

    $(window).scroll(stickyAddToCartToggle);


    // Product Shortcode - Ajax Pagination

    jQuery( 'body' ).delegate( '.dt-sc-product-pagination a', 'click', function(e) {
        
        var this_item = jQuery(this);

        // Pagination Data
        if(this_item.parent().hasClass('prev-post')) {
            var current_page = parseInt(this_item.attr('data-currentpage'), 10)-1;
        } else if(this_item.parent().hasClass('next-post')) {
            var current_page = parseInt(this_item.attr('data-currentpage'), 10)+1;
        } else {
            var current_page = this_item.text();
        }

        var post_per_page = this_item.parents('.dt-sc-product-pagination').attr('data-postperpage');

        if(current_page == 1) { 
            var offset = 0; 
        } else if(current_page > 1) { 
            var offset = ((current_page-1)*post_per_page); 
        }

        var function_call = this_item.parents('.dt-sc-product-pagination').attr('data-functioncall');
        var output_div = this_item.parents('.dt-sc-product-pagination').attr('data-outputdiv');

        var shortcodeattrs = this_item.parents('.dt-sc-product-pagination').attr('data-shortcodeattrs');


        // Ajax call
        jQuery.ajax({
            type: "POST",
            url: dttheme_urls.ajaxurl,
            data:
            {
                action: function_call,
                current_page: current_page,
                offset: offset,
                post_per_page: post_per_page,
                function_call: function_call,
                output_div: output_div,
                shortcodeattrs: shortcodeattrs,
            },      
            beforeSend: function(){
                this_item.parents('.'+output_div).prepend( '<div class="dt-sc-product-loader"><i class="fa fa-spinner fa-spin"></i></div>' );
            },            
            success: function (response) {
                this_item.parents('.'+output_div).replaceWith(response);
                jQuery(window).trigger('resize');
            },
            complete: function(){
                this_item.parents('.'+output_div+' .dt-sc-product-loader').remove();
            }                   
        });

        e.preventDefault();
                        
    });    


    // Quatity plus & minus button

    jQuery( 'body' ).delegate( '.quantity .plus, .quantity .minus', 'click', function(e) {

        var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = '1';

        if ( $( this ).is( '.plus' ) ) {
            if ( max && ( currentVal >= max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }
        } else {
            if ( min && ( currentVal <= min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }
        }

        $qty.trigger( 'change' );

        e.preventDefault();

    });  


    // Product Size Guide

    jQuery( 'body' ).delegate( '.wcsg_btn_wrapper .dt-wcsg-button', 'click', function(e) {
        
        var this_item = jQuery(this);
        var product_id = this_item.attr('data-product_id');

        // ajax call
        jQuery.ajax({
            type: "POST",
            url: dttheme_urls.ajaxurl,
            data:
            {
                action: 'pallikoodam_size_guide_popup',
                product_id: product_id
            },      
            beforeSend: function(){
                this_item.parents('.wcsg_btn_wrapper').prepend( '<div class="dt-sc-product-loader"><i class="fa fa-spinner fa-spin"></i></div>' );
            },            
            success: function (response) {
                jQuery('body').append(response);
            },
            complete: function(){
                this_item.parents('.wcsg_btn_wrapper').find('.dt-sc-product-loader').remove();
            }                   
        });

        e.preventDefault();
                        
    }); 

    // Product Size Guide Close

    jQuery( 'body' ).delegate( '.dt-sc-size-guide-popup-close', 'click', function(e) {
        
        var this_item = jQuery(this);
        this_item.parents('.dt-sc-size-guide-popup-container').remove();

        e.preventDefault();
                        
    });
        

    // Ajax add to cart on the product page

    var $warp_fragment_refresh = {
        url: wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
        type: 'POST',
        success: function( data ) {

            if ( data && data.fragments ) {

                $.each( data.fragments, function( key, value ) {
                    $( key ).replaceWith( value );
                });

                $( document.body ).trigger( 'wc_fragments_refreshed' );
                $( document.body ).trigger( 'added_to_cart' );

            }

        }
    };

    $('.entry-summary form.cart').on('submit', function (e)
    {

        if(!dttheme_urls.enable_ajax_addtocart) {
            return;
        }

        if($(this).parents('.product').hasClass('product-type-external')) {
            return;
        }

        e.preventDefault();

        var product_url = window.location,
            form = $(this);

        form.find('.single_add_to_cart_button').addClass( 'loading' );

        var simple_addtocart = '';
        if(form.parents('.product').hasClass('product-type-simple')) {
            simple_addtocart = '&add-to-cart='+form.find('.single_add_to_cart_button').attr('value');
        }

        $.post(product_url, form.serialize() + simple_addtocart + '&_wp_http_referer=' + product_url, function (result)
        
        {

            var cart_dropdown = $('.widget_shopping_cart', result)
            $('.widget_shopping_cart').replaceWith(cart_dropdown); // update dropdown cart
            $.ajax($warp_fragment_refresh); // update fragments

            form.find('.single_add_to_cart_button').removeClass( 'loading' ); 

        });

    });

	if($('body').hasClass('post-type-archive-product')) {
		$( document ).ajaxComplete(function() {
			$("select").each(function(){
				if($(this).css('display') != 'none') {
					$(this).wrap( '<div class="selection-box"></div>' );
				}
			});
		});
	}
});