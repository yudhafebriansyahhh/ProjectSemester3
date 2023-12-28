</div>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="<?= base_url('assets') ?>/Admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<!-- Main JS -->
<script src="<?= base_url('assets') ?>/Admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= base_url('assets') ?>/Admin/assets/js/dashboards-analytics.js"></script>
<script src="<?= base_url('assets') ?>/Admin/assets/js/extended-ui-perfect-scrollbar.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url('assets')?>/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url("assets")?>/js/myscript.js"></script>
<script>
$(document).ready(function(){
    // Ambil path URL
    var path = window.location.pathname;

    // Cari elemen menu dengan href sesuai dengan path URL
    $('.menu-link').each(function() {
        var href = $(this).attr('href');
        
        // Bandingkan path URL dengan href menu
        if (path === href) {
            // Tambahkan class "active" pada menu yang sesuai
            $(this).closest('li').addClass('active');
        }
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
</script>


</body>

</html>