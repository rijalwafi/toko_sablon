<!-- main content -->
<main>
    <main class="row">
        <div class="container ">
            <div class="col s11 dashboard-main z-depth-5" style="background: white; margin-left: 50px;">


                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            <h4 class="center">Status Pesanan</h4>
                        </span>
                        <p> klik tombol <span>
                                <div class="btn-floating btn-small grey darken-2  tooltipped"
                                    data-tooltip="Pesanan sedang dikirim">

                                    <i class="material-icons">assignment_late</i>
                                </div>
                            </span></p>
                        <pre>Jika Paket Sudah Sampai</pre>
                    </div>

                </div>
                <table class="striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th hidden>id</th>
                            <th>Username</th>
                            <th>Produk</th>
                            <th>Alamat</th>
                            <th hidden>Jumlah Beli</th>
                            <th hidden>Size</th>
                            <th hidden>TotalBayar</th>

                            <th>Design Sablon</th>
                            <th hidden>Tanggal Beli</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i=1;
                $pesanan_baru='';
                $kirim="kirim";
                $dibayar="dibayar";
                $terkirim="done";
                $bukti_bayar=""; ?>
                        <?php foreach($sales as $tb_sales): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td hidden><?php $tb_sales['id_user'];?></td>
                            <td><?= $tb_sales['username'] ?></td>
                            <td><?= $tb_sales['name_product'] ?></td>
                            <td><?= $tb_sales['address'] ?></td>
                            <td hidden><?= $tb_sales['jumlah_beli'] ?></td>
                            <td hidden><?= $tb_sales['size']?></td>
                            <td hidden><?= $tb_sales['amount'] ?></td>
                            <td>

                                <?php if($tb_sales['design_sablon']==$bukti_bayar):?>
                                <img src="<?= base_url('assets/image/design_sablon/no_image.png'); ?>"
                                    style="width: 60px; cursor:pointer;" alt="bukti pembayaran" id="design_sablon">

                                <?php else:?>
                                <img src="<?= base_url('assets/image/design_sablon/').$tb_sales['design_sablon'] ?>"
                                    style="width: 60px; cursor:pointer;" alt="bukti pembayaran" class="buktibayar">
                                <?php endif;?>

                            </td>
                            <td hidden><?= $tb_sales['sales_date'] ?></td>
                            <?php 
                                    ?>
                            <?php if($tb_sales['status']==$pesanan_baru):?>
                            <td><span class="new badge red darken-2" data-badge-caption="Menunggu Pembayaran"></span>
                            </td>
                            <?php elseif($tb_sales['status']==$dibayar):?>
                            <td><span class="new badge orange darken-2" data-badge-caption="Sedang dikemas"></span>
                            </td>
                            <?php elseif($tb_sales['status']==$kirim):?>
                            <td><span class="new badge grey darken-2" data-badge-caption=" Sedang Dikirim"></span>
                            </td>
                            <?php elseif($tb_sales['status']==$terkirim):?>
                            <td><span class="new badge blue darken-2" data-badge-caption="Pesanan Diterima"></span>
                                <?php endif?>
                            <td>
                                <span>
                                    <div class="btn-floating btn-small deep-orange accent-3 m m-1 tooltipped"
                                        data-tooltip="Detail Pesanan">
                                        <a href="#modalDetailPesanan<?= $tb_sales['id_sales'] ?>" class="modal-trigger">

                                            <i class="material-icons">library_books</i></a>
                                    </div>

                                    <?php 
                            $pesanan_baru='';
                            $kirim="kirim";
                            $dibayar="dibayar";
                            
                            $terkirim="done"?>
                                    <?php if ($tb_sales['status']==$pesanan_baru): ?>
                                    <div class="btn-floating btn-small red darken-2  tooltipped"
                                        data-tooltip="Verivikasi Pembayaran">
                                        <a href="#modalPembayaran<?= $tb_sales['id_sales'] ?>" class="modal-trigger">
                                            <i class="material-icons">report</i></a>

                                    </div>

                                    <?php elseif($tb_sales['status']==$dibayar): ?>


                                    <div class="btn-floating btn-small orange darken-2  tooltipped"
                                        data-tooltip="Pesanan di produksi">


                                        <i class="material-icons">layers</i></a>
                                    </div>
                                    <?php elseif($tb_sales['status']==$kirim):?>
                                    <div class="btn-floating btn-small grey darken-2  tooltipped"
                                        data-tooltip="Pesanan sedang dikirim">
                                        <a href="#modalKirim<?= $tb_sales['id_sales'] ?>" class="modal-trigger">
                                            <i class="material-icons">assignment_late</i></a>
                                    </div>

                                    <?php elseif($tb_sales['status']==$terkirim):?>
                                    <button class="btn-floating btn-small blue darken-1  tooltipped"
                                        data-tooltip="Pesanan Terkirim" style="pointer-events:none;">
                                        <a href="#modalKirim<?= $tb_sales['id_sales'] ?>" class="modal-trigger"><i
                                                class="material-icons">done</i></a>
                                    </button>
                                    <?php endif;?>
                                </span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="right"></tfoot>
                </table>

                <!-- modal kirim -->
                <?php $no=0; foreach($sales as $tb_sales): $no++; ?>
                <div id="modalKirim<?= $tb_sales['id_sales'] ?>" class="modal">
                    <form action="<?php echo base_url('penjualan/update_statu')?>" method="post">
                        <div class="modal-content">
                            <p>Silahkan ganti status saat ini.</p>
                            <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>" name="id_sales"
                                id="id_sales" class="form-control">
                            <input type="hidden" readonly value="<?= $tb_sales['id_product'];?>" name="id_product"
                                id="id_product" class="form-control">

                            <select name="status" id="status">
                                <?php 
                            $pesanan_baru='';
                            $kirim="kirim";
                            $dibayar="dibayar";
                            
                            $terkirim="done"?>
                                <?php if($tb_sales['status']==$pesanan_baru):?>
                                <option value="dibayar" <?php echo 
                        ($tb_sales['status'] == 'dibayar' ? ' selected' : ''); ?>>sudah bayar</option>
                                <?php elseif($tb_sales['status']==$dibayar):?>
                                <option value="kirim"
                                    <?php echo ($tb_sales['status'] == 'kirim' ? ' selected' : ''); ?>>
                                    kirim
                                </option>
                                <?php elseif($tb_sales['status']==$kirim):?>
                                <option value="done" <?php echo ($tb_sales['status'] == 
                        'done' ? ' selected' : ''); ?>>Pesanan Diterima
                                </option>
                                <?php endif?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                class="modal-close waves-effect waves-green btn-flat green lighten-2">YA</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat red">Tidak</a>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>

                <!-- end of modal kirim -->

                <!--  modal lihat detail pesanan-->
                <?php $no=0; foreach($sales as $tb_sales): $no++; ?>
                <div id="modalDetailPesanan<?= $tb_sales['id_sales'] ?>" class="modal modal-fixed-footer">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="modal-content">
                            <h4>Detail Pemesanan</h4>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>"
                                            name="id_product" id="id_product" class="form-control">
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="username" name="username" type="text"
                                                value="<?= $tb_sales['username'];?>" class="validate" readonly />
                                            <label for="username">Nama Pemesan</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">dns</i>
                                            <input id="name_product" name="name_product" type="text"
                                                value="<?= $tb_sales['name_product'];?>" class="validate" readonly />
                                            <label for="name_product">Nama Produk</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">credit_card</i>
                                            <input id="amount" name="amount" value="<?= $tb_sales['size'] ?>"
                                                type="text" class="validate" readonly />
                                            <label for="amount">Size</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">credit_card</i>
                                            <input id="awarna" name="warna" readonly value="<?=$tb_sales['warna'] ?>"
                                                type="text" class="validate" />
                                            <label for="amount">warna</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">contact_phone</i>
                                            <input id="jumlah_beli" name="jumlah_beli"
                                                value="<?= $tb_sales['jumlah_beli'] ?>" type="number" class="validate"
                                                readonly />
                                            <label for="jumlah_beli">jumlah beli</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">contact_phone</i>
                                            <input id="jumlah_beli" name="jumlah_beli"
                                                value="<?= $tb_sales['sales_date'] ?>" type="text" class="validate"
                                                readonly />
                                            <label for="jumlah_beli">waktu pemesanan</label>
                                        </div>
                                        <!-- 
                                        <div class="col s6">
                                            <p>Bukti pembayaran</p>

                                            <?php if($payment['bukti_bayar']==$bukti_bayar):?>
                                            <img src="<?= base_url('assets/image/bukti_bayar/no_image.png'); ?>"
                                                style="width: 60px; cursor:pointer;" alt="bukti pembayaran"
                                                class="buktibayar">

                                            <?php else:?>
                                            <img src="<?= base_url('assets/image/bukti_bayar/').$payment['bukti_bayar'] ?>"
                                                style="width: 60px; cursor:pointer;" alt="bukti pembayaran"
                                                class="buktibayar">
                                            <?php endif;?>


                                        </div> -->
                                        <div class="col s6">
                                            <p>Design Sablon</p>
                                            <img src="<?= base_url('assets/image/design_sablon/').$tb_sales['design_sablon'] ?>"
                                                style="width: 60px; cursor:pointer;" alt="design sablon"
                                                class="buktibayar">

                                        </div>
                                        <div class="input-field col s6 right">
                                            <i class="material-icons prefix">credit_card</i>
                                            <input id="amount" name="amount" value="<?= $tb_sales['amount'] ?>"
                                                type="text" class="validate   " readonly />

                                            <?php if($tb_sales['status']==$pesanan_baru):?>
                                            <span class="new badge red accent-4 "
                                                data-badge-caption="Menunggu Pembayaran "></span>
                                            <?php else:?>
                                            <span class="new badge green accent-4 "
                                                data-badge-caption="pembayaran selesai "></span>
                                            <?php endif?>
                                            <label for=" amount">Total Bayar</label>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <a href="#!" class="modal-close waves-effect waves-green btn-flat red">close</a>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
                <!-- end of modal lihat detail pesanan-->
                <!-- modal pembayaran -->
                <?php $no=0; foreach($sales as $tb_sales): $no++; ?>
                <div id="modalPembayaran<?= $tb_sales['id_sales'] ?>" class="modal modal-fixed-footer">
                    <form action="<?php echo base_url('home/kirim_pembayaran')?>" enctype="multipart/form-data"
                        method="post">
                        <div class="modal-content">
                            <h4>Pembayaran Pesanan</h4>
                            <div class="card col 12 m6 blue-grey darken-1 z-depth-3">
                                <div class="card-content white-text">
                                    <span class="card-title">Nomer Rekening Pembayaran</span>
                                    <p>Nama Bank : BCA</p>
                                    <P>Atas Nama : Ahmad Zulkarnain Fuadi</p>
                                    <p>Nomer Rekening : 7390875147</p>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>"
                                            name="id_product" id="id_product" class="form-control">
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="username" name="username" type="text"
                                                value="<?= $tb_sales['username'];?>" class="validate" readonly />
                                            <label for="username">Nama Pemesan</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">dns</i>
                                            <input id="name_product" name="name_product" type="text"
                                                value="<?= $tb_sales['name_product'];?>" class="validate" readonly />
                                            <label for="name_product">Nama Produk</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">dns</i>
                                        <input id="address" name="address" type="text"
                                            value="<?= $tb_sales['address'];?>" class="validate" readonly />
                                        <label for="address">Alamat Pengiriman</label>
                                    </div>
                                    <input name="id_sales" id="id_sales" hidden
                                        value="<?= $tb_sales['id_sales'];?>"></input>
                                    <input name="id_user" id="id_user" hidden value="<?= $user['id_user'];?>"></input>
                                    <input name="id_product" id="id_product" hidden
                                        value="<?= $tb_sales['id_product'];?>"></input>
                                    <div class="input-field col s6">
                                        <select name="nama_ekspedisi" id="nama_ekspedisi">
                                            <option value=" jne" selected>JNE</option>
                                            <option value="pos">POS Indonesia</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="wahana">WAHANA</option>
                                        </select>
                                        <label for="nama_ekspedisi">Pilih Ekspedisi Pengiriman</label>
                                    </div>
                                    <div class="input-field col s6">

                                        <select name="nama_bank" id="nama_bank">

                                            <option value="bca" selected>BCA</option>
                                            <option value="bni">BNI</option>
                                            <option value="mandiri">MANDIRI</option>
                                            <option value="bri">BRI</option>


                                        </select>
                                        <label for="nama_bank">Asal Bank Pengirim</label>
                                    </div>
                                    <div class="input-field col s12 m6" style="margin-top: -5px;">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input type="file" name="bukti_bayar" id="bukti_bayar">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                                <label for="bukti_bayar">Upload Bukti Pembayaran</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-field col s6" hidden>
                                        <i class="material-icons prefix">credit_card</i>
                                        <input id="amount" name="amount" value="<?= $tb_sales['size'] ?>" type="text"
                                            class="validate" readonly />
                                        <label for="amount">Size</label>
                                    </div>
                                    <div class="input-field col s6" hidden>
                                        <i class="material-icons prefix">credit_card</i>
                                        <input id="awarna" name="warna" readonly value="<?=$tb_sales['warna'] ?>"
                                            type="text" class="validate" />
                                        <label for="amount">warna</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">contact_phone</i>
                                        <input id="jumlah_beli" name="jumlah_beli"
                                            value="<?= $tb_sales['jumlah_beli'] ?>" type="number" class="validate"
                                            readonly />
                                        <label for="jumlah_beli">jumlah beli</label>
                                    </div>
                                    <div class="input-field col s6" hidden>
                                        <i class="material-icons prefix">contact_phone</i>
                                        <input id="jumlah_beli" name="jumlah_beli"
                                            value="<?= $tb_sales['sales_date'] ?>" type="date" class="validate"
                                            readonly />
                                        <label for="jumlah_beli">Tanggal Pemesanan</label>
                                    </div>


                                    <div class="col s6" hidden>
                                        <p>Design Sablon</p>
                                        <img src="<?= base_url('assets/image/design_sablon/').$tb_sales['design_sablon'] ?>"
                                            style="width: 60px; cursor:pointer;" alt="bukti pembayaran"
                                            class="buktibayar" class="bukti_bayar">

                                    </div>
                                    <div class="input-field col s6 right">
                                        <i class="material-icons prefix">credit_card</i>
                                        <input id="amount" name="amount" value="<?= $tb_sales['amount'] ?>" type="text"
                                            class="validate  " readonly />

                                        <?php if($tb_sales['status']==$pesanan_baru):?>
                                        <span class="new badge red accent-4 "
                                            data-badge-caption="Menunggu Pembayaran "></span>
                                        <?php else:?>
                                        <span class="new badge green accent-4 "
                                            data-badge-caption="pembayaran selesai "></span>
                                        <?php endif?>
                                        <label for=" amount">Total Bayar</label>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="modal-footer">

                            <a href="#!" class="modal-close waves-effect waves-green btn-flat red">close</a>
                            <button type="submit" class="btn waves-effect blue lightern-1 center-align">Bayar</button>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
                <!-- end of modal pembayaran -->

            </div>
            <!-- end of tabel karyawan -->
        </div>
    </main>
    <!-- end of main content -->

    <!-- footer content -->