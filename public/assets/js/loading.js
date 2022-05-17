$(document).ready(function() {
    var imglogo = "{{ asset('assets/css/style.css') }}";

    $('#simpan').click(function() {
        $('.load').append(
            '<div class="text-center my-5 d-flex justify-content-center align-self-center loading "><div class="row"><div class="mt-5 mb-0 col-12 align-self-center"><img src="https://i.ibb.co/0jCwqKd/Logo.png" alt="logobibu" class="loader"><h5 class="my-5 fw-bold" style="color: #007C84;">Harap Tunggu....</h5></div></div></div>'
        );
        $('.sidebar').css({'position':'fixed'});
    });
});