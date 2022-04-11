$(document).ready(function(){
  $('#btn-update-produk1').click(function(){
    $('#updateProduk').submit();
    Swal.fire(
      'Hapus Pesanan!',
      'Data Pesanan Berhasil di Hapus',
      'success',
    );
  });
});