var FSP = {

	onReady: function() {
		jQuery( '#font-size-picker a').click( FSP.changeSize );
	},

	changeSize: function( e ){
		e.preventDefault();
		var newSize = jQuery(this).data('size');
		jQuery('body').removeClass('font-small').removeClass('font-regular').removeClass('font-large').addClass(newSize);
		jQuery.post( FSP_data.ajax_url, { action: 'fictive_change_size', size: newSize }, function(result){
			// console.log( result );
		});
	}
};

jQuery( document ).ready( FSP.onReady );
