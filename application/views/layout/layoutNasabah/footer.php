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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url("assets") ?>/js/myscript.js"></script>
<script>
    // client.js

    var options = {
        series: [],
        chart: {
            type: 'donut',
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    // Lakukan permintaan AJAX ke server untuk mendapatkan data dari database berdasarkan nasabah
    fetch('Nasabah/getDataByNasabah') // Gantilah 'URL_CI' dengan base_url CodeIgniter Anda
        .then(response => response.json())
        .then(data => {
            // Mengganti data pada konfigurasi grafik dengan data dari server
            options.series = data.map(berat => ({
                data: [berat]
            }));

            // Merender grafik
            chart.render();
        })
        .catch(error => console.error('Error:', error));
</script>


</body>

</html>