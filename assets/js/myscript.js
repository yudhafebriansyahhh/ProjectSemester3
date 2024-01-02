document.addEventListener('DOMContentLoaded', function () {
    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata) {
        // Make the flash data case insensitive
        const lowerCaseFlashData = flashdata.toLowerCase();

        // Determine the alert type based on the keyword 'gagal' (lowercase)
        const alertType = lowerCaseFlashData.includes('gagal') ? 'error' : 'success';

        // Determine the text based on the alert type
        const alertText = alertType === 'success' ? 'Berhasil' : 'Terjadi Kesalahan';

        Swal.fire({
            icon: alertType,
            title: alertText,
            text: flashdata
        });
    }
    //tombol hapus
    $('.tombol-hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    var metodePembayaranSelect = document.getElementById('defaultSelect');
    var bankFormElements = document.querySelectorAll('.bank-form');
    var dompetFormElements = document.querySelectorAll('.dompet-form');

    metodePembayaranSelect.addEventListener('change', function () {
        var selectedOption = metodePembayaranSelect.options[metodePembayaranSelect.selectedIndex].value;

        // Sembunyikan semua formulir bank dan dompet digital terlebih dahulu
        bankFormElements.forEach(function (element) {
            element.style.display = 'none';
        });
        dompetFormElements.forEach(function (element) {
            element.style.display = 'none';
        });

        // Tampilkan formulir bank jika metode pembayaran adalah Bank Transfer
        if (selectedOption === 'Bank Transfer') {
            bankFormElements.forEach(function (element) {
                element.style.display = 'block';
            });
        }
        // Tampilkan formulir dompet digital jika metode pembayaran adalah Dompet Digital
        else if (selectedOption === 'Dompet Digital') {
            dompetFormElements.forEach(function (element) {
                element.style.display = 'block';
            });
        }
    });
});



function resetFileInput() {
    // Reset nilai file input
    document.getElementById('upload').value = '';

    // // Hapus tampilan gambar terpilih
    // document.getElementById('uploadedAvatar').src = '';
}
