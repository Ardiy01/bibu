$(document).ready(function() {
    $('#kabupaten').on('change', function() {
        var value = $('#kabupaten').val();
        var kcmtan = document.getElementById('#kecamatan');
        $('#kecamatan').html(" ");
        $.ajax({
            type: "get",
            url: "registrasi",
            data: {
                value: value
            },
            dataType: "json",
            success: function(data) {
                var kcmt = data.kecamatan;

                $.each(kcmt, function(index, obj) {
                    $('#kecamatan').append('<option value="' + obj.id + '">' + obj.nama_kecamatan + '</option>');
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });
});