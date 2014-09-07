(function( jQuery ) {
    jQuery(document).ready(function(){
        jQuery(document).on('click', '.array-input-remove', function(){
            jQuery(this).parents('.input-group').remove();
        });
        jQuery(document).on('click', '.array-input-plus', function(){
            var inputGroup = jQuery(this).parents('.input-group');
            var inputClone = inputGroup.clone();
            inputClone.find('input').val('');
            inputGroup.after(inputClone);
            jQuery(this).removeClass('array-input-plus')
                .addClass('array-input-remove')
            .find('i')
                .removeClass('glyphicon-plus')
                .addClass('glyphicon-remove')
        });
    })
})(jQuery)
