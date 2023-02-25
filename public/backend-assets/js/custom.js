function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_show').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#change_image").change(function () {
    readURL(this);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#search').keyup(function () {
        let search = $(this).val();
        if (search == '') {
            $('#box').fadeOut();
        }
        let url = searchURL;
        if (search != '') {
            $.ajax({
                url: url,
                method: "POST",
                data: {search: search},
                success: function (data) {
                    $('#box').fadeIn();
                    $('#box').html(data);
                }
            });
        }
    });
});
