document.addEventListener('DOMContentLoaded', function () {
    const flashdata = $('.flash-data').data('flashdata');

    if (flashdata) {
        // Menggunakan toLowerCase() untuk memastikan case insensitive
        const lowerCaseFlashData = flashdata.toLowerCase();

        // Tentukan tipe alert berdasarkan kata kunci 'gagal' (huruf kecil)
        const alertType = lowerCaseFlashData.includes('gagal') ? 'error' : 'success';

        // Tentukan teks berdasarkan tipe alert
        const alertText = alertType === 'success' ? 'Berhasil' : '';

        Swal.fire({
            title: alertType === 'success' ? 'Berhasil' : 'Terjadi Kesalahan',
            text: alertText + flashdata,
            icon: alertType
        });
    }
});