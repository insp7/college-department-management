$(function() {
    document.getElementById('image').onchange = function () {
        var name = document.getElementById('image');
        $('#file_name').html(name.files.item(0).name);
        $('#add_image_button').html("Change image");
    };

    $('#lr_receipt').magnificPopup({type: 'image'});

});
