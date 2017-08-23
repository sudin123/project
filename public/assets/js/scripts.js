//==============================================================
// CUSTOM SCRIPTS
// 2014
// copyright lamputer.com
// ==============================================================
jQuery(document).ready(function ($) {


    $("#rec-slider").owlCarousel({
        margin: 6,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            }
        }
    });


//    $('.dropdown-toggle').dropdown();
    $('.dropdown-toggle').on('click', function (event) {
        $(this).parent().toggleClass("open");
        $(this).parent().siblings().removeClass("open");
    });
    $('body').on('click', function (e) {
        if (!$('li.dropdown-parent').is(e.target) && $('li.dropdown-parent').has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
            $('li.dropdown-parent').removeClass('open');
        }
    });
    $(".chosen-select").chosen({width: '100%'});


    $('#selectall').click(function (event) {  //on click
        if (this.checked) { // check select status
            $('.groupcheck').each(function () { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else {
            $('.groupcheck').each(function () { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });
        }
    });



    // make all input fields with type 'file' invisible
    /* jQuery(':file').css({
     'visibility': 'hidden',
     'display': 'none'
     });*/

// add a textbox after *each* file input
    /* jQuery('.file-upload :file').after('<input type="text" readonly="readonly"  class="fileChooserText medium" placeholder="Recommended: 177px and 143px"/> <input type="button" value="browse" class="fileChooserButton button gform_button" />');*/
// add *click* event to *each* pseudo file button

// to link the click to the *closest* original file input

    jQuery('.fileChooserButton').click(function () {
        jQuery(this).parent().find(':file').click();
    }).show();


// add *change* event to *each* file input

// to copy the name of the file in the read-only text input field

    jQuery(':file').change(function () {
        jQuery(this).parent().find('.fileChooserText').val(jQuery(this).val());
    });

    $('#add_img').click(function (e) {
        e.preventDefault();
        $('#featuredimage').trigger('click');
    });
    $('#add_logo').click(function (e) {
        e.preventDefault();
        $('#companylogo').trigger('click');
    });
    $('.user-name').click(function () {
        $('.user-link').slideToggle();
    });
    $(document).on("click", '.remove', function () {
        $(this).closest('.img-prev').remove();
    });
    $('#featuredimage').change(function (e) {
        var files = e.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    var prev = '<div class="img-prev"><img class="thumb" src="' + e.target.result + '"/><div class="remove"><i class="ico-remove"></i></div><input type="hidden" name="featured_image" value="' + e.target.result + '"></div>';
                    $('.img-prev').remove();
                    $('.image-upload').append(prev);

                };
            })(f);
            reader.readAsDataURL(f);
        }
    });
    $('#companylogo').change(function (e) {
        var files = e.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    var prev = '<div class="img-prev"><img class="thumb" src="' + e.target.result + '"/><div class="remove"><i class="ico-remove"></i></div><input type="hidden" name="featured_image" value="' + e.target.result + '"></div>';
                    $('.img-prev').remove();
                    $('.file-upload .ginput_container').append(prev);

                };
            })(f);
            reader.readAsDataURL(f);
        }
    });
    $("#accordion").accordion({
        heightStyle: "content",
        collapsible: true,
        active: false,
        animate: 500
    });
    $('[data-toggle="tooltip"]').tooltip();
});




$(document).ready(function () {

    var sync1 = $("#items-gallery");

    sync1.owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
        dots: false
    });
});