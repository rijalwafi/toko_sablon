<!-- main content -->
<div class="row dashboard">
    <h5><?= $judul ?></h5>

    <!-- tabel karyawan -->
    <div class="col s11 dashboard-main" style="background: white; margin-left: 50px;">
        <table class="striped" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Barang</th>
                    <th width="200">Alamat</th>
                    <th hidden>Jumlah Beli</th>
                    <th hidden>Ukuran</th>
                    <th hidden>Total Bayar</th>

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
                $bukti_bayar=""; 
                $tb_sales="id_user";
              
              ?>
                <?php foreach($sales as $tb_sales): ?>
                <input type="text" hidden name="jumlah_beli" id="jumlah_beli" value="<?= $tb_sales['jumlah_beli'] ?>">
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $tb_sales['username'] ?></td>
                    <td><?= $tb_sales['name_product'] ?></td>
                    <td><?= $tb_sales['address'] ?></td>
                    <td hidden><?= $tb_sales['jumlah_beli'] ?></td>
                    <td hidden><?= $tb_sales['size']?></td>
                    <td hidden><?= $tb_sales['amount'] ?></td>
                    <td>

                        <?php if($tb_sales['design_sablon']==$bukti_bayar):?>

                        <img src="<?= base_url('assets/image/design_sablon/no_image.png'); ?>"
                            style="width: 60px; cursor:pointer;" alt="design sablon" class="buktibayar">
                        <?php else: ?>
                        <img src="<?= base_url('assets/image/design_sablon/').$tb_sales['design_sablon'] ?>"
                            style="width: 60px; cursor:pointer;" alt="design sablon" class="buktibayar">

                        <?php endif;?>

                    </td>
                    <td hidden><?= $tb_sales['sales_date'] ?></td>
                    <?php 
 ?>
                    <?php if($tb_sales['status']==$pesanan_baru):?>
                    <td><span class="new badge red darken-2" data-badge-caption="Pesanan Baru"></span>
                    </td>
                    <?php elseif($tb_sales['status']==$dibayar):?>
                    <td><span class="new badge orange darken-2" data-badge-caption="Sudah bayar"></span>
                    </td>
                    <?php elseif($tb_sales['status']==$kirim):?>
                    <td><span class="new badge grey darken-2" data-badge-caption=" Sedang Dikirim"></span>
                    </td>
                    <?php elseif($tb_sales['status']==$terkirim):?>
                    <td><span class="new badge blue darken-2" data-badge-caption="Pesanan Terkirim"></span>
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
                                <i class="material-icons">report</i></a>
                            </div>

                            <?php elseif($tb_sales['status']==$dibayar): ?>


                            <div class="btn-floating btn-small orange darken-2  tooltipped" data-tooltip="Kirim Barang">
                                <a href="#modalKirim<?= $tb_sales['id_sales'] ?>" class="modal-trigger">

                                    <i class="material-icons">arrow_forward</i></a>
                            </div>
                            <?php elseif($tb_sales['status']==$kirim):?>
                            <div class="btn-floating btn-small grey darken-2  tooltipped"
                                data-tooltip="Pesanan sedang dikirim">
                                <i class="material-icons">directions_run</i></a>
                            </div>

                            <?php elseif($tb_sales['status']==$terkirim):?>
                            <button class="btn-floating btn-small blue darken-1  tooltipped"
                                data-tooltip="Pesanan Terkirim">
                                <i class=" material-icons">done</i></a>
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
            <form action="<?php echo base_url('penjualan/update_status')?>" method="post">
                <div class="modal-content">
                    <p>Silahkan ganti status saat ini.</p>
                    <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>" name="id_sales" id="id_sales"
                        class="form-control">
                    <input type="hidden" readonly value="<?= $tb_sales['id_product'];?>" name="id_product"
                        id="id_product" class="form-control">
                    <input type="text" hidden name="jumlah_beli" id="jumlah_beli"
                        value="<?= $tb_sales['jumlah_beli'] ?>">
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
                        <option value="kirim" <?php echo ($tb_sales['status'] == 'kirim' ? ' selected' : ''); ?>>kirim
                        </option>
                        <?php elseif($tb_sales['status']==$kirim):?>
                        <option value="done" <?php echo ($tb_sales['status'] == 
                        'done' ? ' selected' : ''); ?>>Pesanan Terkirim
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
                                <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>" name="id_product"
                                    id="id_product" class="form-control">
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
                                    <input id="amount" name="amount" value="<?= $tb_sales['size'] ?>" type="text"
                                        class="validate" readonly />
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
                                    <input id="jumlah_beli" name="jumlah_beli" value="<?= $tb_sales['jumlah_beli'] ?>"
                                        type="number" class="validate" readonly />
                                    <label for="jumlah_beli">jumlah beli</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">contact_phone</i>
                                    <input id="jumlah_beli" name="jumlah_beli" value="<?= $tb_sales['sales_date'] ?>"
                                        type="text" class="validate" readonly />
                                    <label for="jumlah_beli">Tanggal Pemesanan</label>
                                </div>

                                <!-- <div class="col s6">
                                    <p>Bukti pembayaran</p>
                                    <img src="<?= base_url('assets/image/bukti_bayar/').$payment['bukti_bayar'] ?>"
                                        style="width: 60px; cursor:pointer;" alt="bukti pembayaran" class="buktibayar"
                                        class="bukti_bayar">

                                </div> -->
                                <div class="col s6">
                                    <p>Design Sablon</p>
                                    <img src="<?= base_url('assets/image/design_sablon/').$tb_sales['design_sablon'] ?>"
                                        style="width: 60px; cursor:pointer;" alt="design sablon" class="buktibayar"
                                        class="bukti_bayar">

                                </div>
                                <div class="input-field col s6 right">
                                    <i class="material-icons prefix">credit_card</i>
                                    <input id="amount" name="amount" value="<?= $tb_sales['amount'] ?>" type="text"
                                        class="validate  readonly " />

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


    </div>
    <!-- end of tabel karyawan -->
</div>