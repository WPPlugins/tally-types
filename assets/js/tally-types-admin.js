/**
 * @package Tally Types
 *
 * Admin JavaScript of the plugin
**/

jQuery(document).ready(function($){				
	 $( '.tt_color').wpColorPicker();
	 
	//$('.tt-upload-btn').click(function(e) {
	$('body').on('click', '.tt-upload-btn' ,function(e) {
		e.preventDefault();
		
		var this_button = $(this);
					
		if ( image_tt ) {
			image_tt.open();
			return;
		}
					
		var image_tt = wp.media({ 
			title: 'Upload Image',
			// mutiple: true if you want to upload multiple files at once
			multiple: false
		}).open()
		.on('select', function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_image_tt = image_tt.state().get('selection').first();
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			console.log(uploaded_image_tt);
			var image_url_tt = uploaded_image_tt.toJSON().url;
			// Let's assign the url value to the input field
			$(this_button).prev().val(image_url_tt);
			$(this_button).prev().prev().prev().attr('src',image_url_tt);
		});
	});
});