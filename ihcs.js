jQuery( document ).ready(function(jQuery) {
   jQuery('#upload-button').click(function(event){
       event.preventDefault();
       var frame = new wp.media.view.MediaFrame.Select({
           title :    'Select an Image for Banner',
           button:    {
               text: 'Add Image'
           },
           multiple: false,
       });

       var ihcsBanner     =     jQuery( this ).closest( 'label' );
       if (event.currentTarget.id == 'clear-banner' ) {
           //remove value from input
           ihcsBanner.find('.img_value').val('').trigger('change');

           //remove preview image
           ihcsBanner.find('.img_value').html('');
           return;
       }

       // Make sure the media API exists
       if ( typeof wp === 'undefined' || !wp.media ) {
           return;
       }
       event.preventDefault();

       // Activate the media editor
      // var val = ihcsBanner.find( '.img_value' ).val();

       frame.open();
       frame.on(
           'select', function() {

               var img      =   frame.state().get('selection').first().toJSON();
               //clear screenshot div so we can append new selected images
               ihcsBanner.find( '.img-screenshot' ).html( '' );
               jQuery('#ihcsban').attr('src', img.url);
               jQuery('#banner_id').val( img.id );
           }
       );
       return false;
   });
    jQuery('#clear-button').click(function(){
          jQuery( '#ihcsban' ).attr( 'src', '' );
          jQuery( '#banner_id' ).attr( 'value', '' );
    });
});
jQuery(document).ready( function() {

    jQuery('input.date-input').datepicker();

    // jQuery("#ihcs_font_family").val("raleway");
    //
    // document.getElementById('showVal').onclick = function () {
    //     el.value = sel.value;
    // }
});