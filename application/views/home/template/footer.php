<footer class="page-footer grey lighten-1 ">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <img src="<?php echo base_url() ?>assets/image/eclooth.png" alt="logo" style="width:100%;margin:10 10;">
                <p class="grey-text text-lighten-4">
                    Kepuasan Pelanggan prioritas kami
                </p>
            </div>
            <div class="col s12 m6">
                <h5 style="margin-top: 3rem;">Alamat Kami :</h5>
                <p>Jl. RA Kartini No 32B (Sebelah Pusat Gadai Kartini & Depan Kopi Kong Uthe, sederetan SD/SMP Bani
                    Saleh</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright center">
        <div class="container">
            © 2021 Copyright Eclooth
        </div>
    </div>
</footer>
<!-- end of footer -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="<?= base_url('assets/laporan/plugins/jquery/jquery.min.js'); ?>"></script>

<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="<?= base_url('assets/js/app.js') ?>" type="module"></script>
<script>
//animation for hamburger icon
function myFunction(x) {
    x.classList.toggle('change');
}
$(document).ready(function() {
    $('#total_beli, #selling_price').keyup(function() {
        var selling_price = $('#selling_price').val();
        var total_beli = $('#total_beli').val();

        var total_harga = parseInt(selling_price) * parseInt(total_beli);
        // $('#total_harga').val(total_harga) ;
        if (!isNaN(total_harga)) {
            document.getElementById('total_harga').value = total_harga.toFixed(0);
        }
    });
});

$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

</body>

</html>