jQuery(function(){
	var $ = jQuery;
	
	var jq_edc_page_type = $('#edc_page_type'),
	    jq_edc_mirror_page_options = $('#edc_mirror_page_options'),
	    jq_edc_redirect_options = $('#edc_redirect_options');
	    
    if (jq_edc_page_type.length) {
    	change_visible_metaboxes();
    	$(jq_edc_page_type).change(change_visible_metaboxes);
    }
    
    
    // Remove comments by default on new pages/posts
    if($('body').is('.post-new-php, .post-php')) {
        $('#comment_status, #ping_status').removeAttr('checked');
    }
    
    
    
    // place meta box before standard post edit field
	if( document.getElementById('postdiv') ) {
	    $('#edc_redirect_options').insertBefore('#postdiv');
	}
	else if( document.getElementById('postdivrich') ){
	    $('#edc_redirect_options').insertBefore('#postdivrich');
	}
	
	function change_visible_metaboxes() {
		
		// Mirror page
		if ('mirror' == jq_edc_page_type.val()) {
			jq_edc_mirror_page_options.show().effect('highlight', 1000);
		} else {
			jq_edc_mirror_page_options.hide();
		}
		
		// Redirect page
		if ('redirect' == jq_edc_page_type.val()) {
			jq_edc_redirect_options.show().effect('highlight', 1000);
		} else {
			jq_edc_redirect_options.hide();
		}  
		
	}
	
});
