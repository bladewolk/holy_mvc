$(document).ready(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('input[type="file"]').change(function () {
        readURL(this);
    });

    $('#loadModal').click(function () {
        $('.preview_name').html($('input[name="name"]').val());
        $('.preview_email').html($('input[name="email"]').val());
        $('.preview_text').html($('#textarea').val());

        uploadedImage = $('#image_upload_preview').attr('src');
        $('.preview_image').attr('src', uploadedImage);
    })
});

