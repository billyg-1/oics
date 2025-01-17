jQuery(document).ready(function($) {

	/* vertical tabs */
	if($('ul.dt-sc-tabs-vertical').length > 0){
		$('ul.dt-sc-tabs-vertical').each(function(){
			var $effect = $(this).parent('.dt-sc-tabs-vertical-container').attr('data-effect');

			$(this).fpTabs('> .dt-sc-tabs-vertical-content', {
				effect: $effect
			});
		});

		$('.dt-sc-tabs-vertical').each(function(){
			$(this).find("li:first").addClass('first').addClass('current');
			$(this).find("li:last").addClass('last');
		});

		$('.dt-sc-tabs-vertical li').on('click', function(){
			$(this).parent().children().removeClass('current');
			$(this).addClass('current');
		});
	}

	if($('ul.dt-sc-tabs-horizontal-frame').length > 0){
		$('ul.dt-sc-tabs-horizontal-frame').each(function(){
			var $effect = $(this).parent('.dt-sc-tabs-horizontal-frame-container').attr('data-effect');

			$(this).fpTabs('> .dt-sc-tabs-horizontal-frame-content', {
				effect: $effect
			});
		});
	}
});