$(document).ready(function() {
    var gender = $('#jenis_kelamin').val();
    if(gender == "Perempuan"){
        $('#jenis_kelamin').append('<option value="Laki - Laki" style="color: #007C84">Laki - Laki</option>');
    } else{
        $('#jenis_kelamin').append('<option value="Perempuan" style="color: #007C84">Perempuan</option>');
    };

    $('#kabupaten').on('change', function() {
        var id = $('#id_us').val()
        var value = $('#kabupaten').val();
        $('#kecamatan').html("");
        $.ajax({
            type: "get",
            url: "/dashboard/profil/" + id + "/edit",
            data: {value: value},
            dataType: "json",
            success: function(data) {
                var kcmt = data.kecamatan;
                $.each(kcmt, function(index, obj){
                    $('#kecamatan').append('<option value="' + obj.id + '">' + obj.nama_kecamatan + '</option>');
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });
});