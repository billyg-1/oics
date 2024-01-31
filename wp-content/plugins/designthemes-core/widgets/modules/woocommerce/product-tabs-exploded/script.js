( function( $ ) {

	var dtShopProductSingleTabsExploded = function($scope, $){

        if($('.dt-sc-content-scroll').length) {
            $('.dt-sc-content-scroll').niceScroll({ cursorcolor:"#000", cursorwidth: "5px", background:"rgba(20,20,20,0.3)", cursorborder:"none" });
        }

	};
		
    $(window).on('elementor/frontend/init', function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/dt-shop-product-single-tabs-exploded.default', dtShopProductSingleTabsExploded);
    });	
    
} )( jQuery );