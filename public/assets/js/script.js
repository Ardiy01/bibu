$(document).ready(function(){
  // Update Produk
    $('#btn-update-produk').click(function(){
        Swal.fire({
            title: 'Yakin Update Data Produk?',
            text: "Perubahan Akan Mengubah Data Produk",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Update',
            cancelmButtonText: 'Batal',
            
          }).then((result) => {
            if (result.isConfirmed) {
              $('#updateProduk').submit();
            }
          })
    });

    // create produk
    $('#btn-create-produk').click(function(){
      Swal.fire({
        title: 'Yakin Menambah Data Produk?',
        text: "Pastikan Data Sudah Benar",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelmButtonText: 'Batal',
        
      }).then((result) => {
        if (result.isConfirmed) {
          $('#create-produk').submit();
          'Hapus Pesanan!',
          'Data Pesanan Berhasil di Hapus',
          'success'
        }
      })
    });


});