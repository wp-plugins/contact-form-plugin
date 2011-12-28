jQuery(document).ready(function(){
	jQuery('#cntctfrm_additions_options').change( function() {
		if(jQuery(this).is(':checked') )
			jQuery('.cntctfrm_additions_block').removeClass('cntctfrm_hidden');
		else
			jQuery('.cntctfrm_additions_block').addClass('cntctfrm_hidden');
	});
});