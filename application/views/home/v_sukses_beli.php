<main>
    <div class="row">

        <div class="col s12 offset-s4 ">
            <div class="col s12 m6">
                <div class="card  blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Pembelian Berhasil</span>
                        <p>Terima Kasih <big style="text-transform: uppercase;"> <?=$user['username'];?></big> sudah
                            berbelanja di toko kami</p>
                        <p>Silakan Cek <span> <a class="teal-text  text-accent-2"
                                    href="<?= base_url('konsumen/status_pesanan/').$user=$this->session->userdata('id_user')?>">Status
                                    Pesanan</a></span> untuk melakukan pembayaran dan melihat status pesanan kamu</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>