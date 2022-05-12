$(document).ready(function(){
    $('#filter').on('change', function() {
        var value = $('#filter').val();
        $.ajax({
            type: "get",
            url: "dashboard",
            data: {value: value},
            dataType: "json",
            success: function(data) {
                $('#laba').html(" ");
                $('#laba').html('<h5 class="card-title"> Rp. ' + data.laba.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</h5>');

                $('#pendapatan').html(" ");
                $('#pendapatan').html('<h5 class="card-title"> Rp. ' + data.pemasukan.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</h5>');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });
});
