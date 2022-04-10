$(document).ready(function(){
    $("#jml").keyup(function(){
        var hrg = $("#produk_id option:selected").data("harga");
        var jml = $("#jml").val();
        var total = parseInt(hrg) * parseInt(jml);
        total = isNaN(total) ? 0 : total;
        $("#total").text(`Rp. ${total}`);
    });

    $("#produk_id").change(function(){
        var hrg = $("#produk_id option:selected").data("harga");
        var jml = $("#jml").val();
        var total = parseInt(hrg) * parseInt(jml);
        total = isNaN(total) ? 0 : total;
        $("#total").text(`Rp. ${total}`);
    });

    $("#pembayaran_id").change(function(){
        var pmb = $("#pembayaran_id option:selected").data("nama");
        var rek = $("#pembayaran_id option:selected").data("rekening");
        
        $("#pembayaran").text(`${pmb}, ${rek}`)
    });
});